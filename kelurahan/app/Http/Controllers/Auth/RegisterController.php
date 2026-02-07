<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16|unique:penduduk,nik',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'no_kk' => 'required|string|size:16',
            'telepon' => 'nullable|string|max:15',
            'email' => 'nullable|email|unique:penduduk,email',
            'password' => 'required|string|min:6',
        ]);

        Penduduk::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan' => 'Kelurahan Sample',
            'kecamatan' => 'Kecamatan Sample',
            'kabupaten' => 'Kabupaten Sample',
            'provinsi' => 'Provinsi Sample',
            'agama' => $request->agama ?? 'Islam',
            'status_perkawinan' => $request->status_perkawinan ?? 'Belum Kawin',
            'pekerjaan' => $request->pekerjaan ?? 'Belum Bekerja',
            'kewarganegaraan' => 'WNI',
            'no_kk' => $request->no_kk,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Registrasi berhasil! Silakan login.']);
        }

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}