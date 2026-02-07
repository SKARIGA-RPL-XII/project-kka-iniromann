<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penduduk;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16',
            'password' => 'required',
        ]);

        if (Auth::guard('penduduk')->attempt($request->only('nik', 'password'), $request->filled('remember'))) {
            if ($request->expectsJson()) {
                return response()->json(['success' => true, 'redirect' => '/dashboard']);
            }
            return redirect()->intended('/dashboard');
        }

        if ($request->expectsJson()) {
            return response()->json(['success' => false, 'message' => 'NIK atau password salah.'], 422);
        }
        
        return back()->withErrors([
            'nik' => 'NIK atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::guard('penduduk')->logout();
        return redirect('/');
    }
}