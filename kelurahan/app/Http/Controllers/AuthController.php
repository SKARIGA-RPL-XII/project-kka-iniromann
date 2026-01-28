<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|size:16',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Cek apakah NIK terdaftar di database warga
        $warga = Warga::where('nik', $request->nik)->first();
        
        if (!$warga) {
            return redirect()->back()
                ->withErrors(['nik' => 'NIK tidak terdaftar di database kependudukan'])
                ->withInput();
        }

        // Coba login
        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            return redirect()->route('warga.dashboard');
        }

        return redirect()->back()
            ->withErrors(['password' => 'Password salah'])
            ->withInput();
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|size:16|unique:users,nik',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Validasi NIK di database kependudukan
        $warga = Warga::where('nik', $request->nik)->first();
        
        if (!$warga) {
            return redirect()->back()
                ->withErrors(['nik' => 'NIK tidak ditemukan di database kependudukan. Silahkan hubungi kelurahan.'])
                ->withInput();
        }

        // Buat user baru
        $user = User::create([
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
            'role' => 'warga'
        ]);

        // Update user_id di data warga
        $warga->update(['user_id' => $user->id]);

        Auth::login($user);

        return redirect()->route('warga.dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang di Sistem E-Kelurahan.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}