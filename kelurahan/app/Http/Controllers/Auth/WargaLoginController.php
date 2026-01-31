<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class WargaLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'password' => 'required|string',
        ]);

        $warga = Warga::where('nik', $request->nik)->first();

        if (!$warga || !Hash::check($request->password, $warga->password)) {
            throw ValidationException::withMessages([
                'nik' => ['NIK atau password salah.'],
            ]);
        }

        Auth::guard('warga')->login($warga, $request->remember ?? false);

        return redirect('/dashboard');
    }

    public function showRegistrationForm()
    {
        return view('auth.warga-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|unique:warga|size:16',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'required|string|email|unique:warga',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Validasi NIK dengan database kependudukan eksternal
        $isValidNIK = $this->validateNIKWithExternalDB($request->nik);
        
        if (!$isValidNIK) {
            return back()->withErrors(['nik' => 'NIK tidak valid atau tidak terdaftar.']);
        }

        $warga = Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('warga')->login($warga);

        return redirect('/dashboard');
    }

    private function validateNIKWithExternalDB($nik)
    {
        // Implementasi validasi dengan database kependudukan
        // Contoh sederhana (disesuaikan dengan sistem yang ada)
        // return ExternalKependudukanAPI::validateNIK($nik);
        
        // Untuk development, kita anggap semua NIK valid
        return true;
    }

    public function logout(Request $request)
    {
        Auth::guard('warga')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}