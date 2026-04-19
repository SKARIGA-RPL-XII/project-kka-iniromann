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
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P,Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'no_kk' => 'nullable|string|size:16',
            'telepon' => 'nullable|string|max:15',
            'email' => 'nullable|email|unique:penduduk,email',
            'password' => 'required|string|min:6',
        ]);

        $jenisKelamin = null;
        if ($request->jenis_kelamin) {
            $jenisKelamin = $request->jenis_kelamin === 'Laki-laki' ? 'L' : 
                           ($request->jenis_kelamin === 'Perempuan' ? 'P' : $request->jenis_kelamin);
        }

        Penduduk::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir ?? '-',
            'tanggal_lahir' => $request->tanggal_lahir ?? now(),
            'jenis_kelamin' => $jenisKelamin ?? 'L',
            'alamat' => $request->alamat ?? '-',
            'rt' => $request->rt ?? '0',
            'rw' => $request->rw ?? '0',
            'kelurahan' => $request->kelurahan ?? 'Kelurahan',
            'kecamatan' => $request->kecamatan ?? 'Kecamatan',
            'kabupaten' => $request->kabupaten ?? 'Kabupaten',
            'provinsi' => $request->provinsi ?? 'Provinsi',
            'agama' => $request->agama ?? 'Pilih',
            'status_perkawinan' => $request->status_perkawinan ?? 'Belum Kawin',
            'pekerjaan' => $request->pekerjaan ?? 'Belum Bekerja',
            'kewarganegaraan' => 'WNI',
            'no_kk' => $request->no_kk ?? '-',
            'telepon' => $request->telepon,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Registrasi berhasil! Silakan login.']);
        }

        return redirect('/')->with('register_success', true);
    }
}