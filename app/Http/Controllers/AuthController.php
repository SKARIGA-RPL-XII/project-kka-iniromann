<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'password' => 'required|string'
        ]);

        // Cari warga berdasarkan NIK
        $warga = Warga::where('nik', $request->nik)->first();

        if (!$warga) {
            Alert::error('Error', 'NIK tidak ditemukan');
            return back()->withInput();
        }

        // Verifikasi password
        if (!Hash::check($request->password, $warga->password)) {
            Alert::error('Error', 'Password salah');
            return back()->withInput();
        }

        // Login warga
        Auth::guard('warga')->login($warga);

        Alert::success('Success', 'Login berhasil!');
        return redirect()->route('dashboard');
    }

    // Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|unique:warga,nik',
            'nama' => 'required|string|max:100',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:warga,email',
            'password' => 'required|string|min:6|confirmed',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_kk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload foto KTP
        $fotoKtpPath = $request->file('foto_ktp')->store('foto_ktp', 'public');
        
        // Upload foto KK
        $fotoKkPath = $request->file('foto_kk')->store('foto_kk', 'public');

        // Create warga
        $warga = Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto_ktp' => $fotoKtpPath,
            'foto_kk' => $fotoKkPath,
        ]);

        // Auto login setelah registrasi
        Auth::guard('warga')->login($warga);

        Alert::success('Success', 'Registrasi berhasil!');
        return redirect()->route('dashboard');
    }

    // Logout
    public function logout()
    {
        Auth::guard('warga')->logout();
        Alert::success('Success', 'Logout berhasil!');
        return redirect()->route('login');
    }
}