<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function show()
    {
        $penduduk = Auth::guard('penduduk')->user();
        return view('profil.show', compact('penduduk'));
    }

    public function edit()
    {
        $penduduk = Auth::guard('penduduk')->user();
        return view('profil.edit', compact('penduduk'));
    }

    public function update(Request $request)
    {
        $penduduk = Auth::guard('penduduk')->user();
        
        $request->validate([
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'no_kk' => 'nullable|string|max:16',
            'alamat' => 'nullable|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'agama' => 'nullable|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'status_perkawinan' => 'nullable|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'nullable|string|max:100',
            'telepon' => 'nullable|string|max:15',
            'email' => 'nullable|email|unique:penduduk,email,' . $penduduk->nik . ',nik',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $updateData = [];

        if ($request->filled('tempat_lahir')) $updateData['tempat_lahir'] = $request->tempat_lahir;
        if ($request->filled('tanggal_lahir')) $updateData['tanggal_lahir'] = $request->tanggal_lahir;
        if ($request->filled('jenis_kelamin')) $updateData['jenis_kelamin'] = $request->jenis_kelamin;
        if ($request->filled('no_kk')) $updateData['no_kk'] = $request->no_kk;
        if ($request->filled('alamat')) $updateData['alamat'] = $request->alamat;
        if ($request->filled('rt')) $updateData['rt'] = $request->rt;
        if ($request->filled('rw')) $updateData['rw'] = $request->rw;
        if ($request->filled('kelurahan')) $updateData['kelurahan'] = $request->kelurahan;
        if ($request->filled('kecamatan')) $updateData['kecamatan'] = $request->kecamatan;
        if ($request->filled('kabupaten')) $updateData['kabupaten'] = $request->kabupaten;
        if ($request->filled('provinsi')) $updateData['provinsi'] = $request->provinsi;
        if ($request->filled('agama')) $updateData['agama'] = $request->agama;
        if ($request->filled('status_perkawinan')) $updateData['status_perkawinan'] = $request->status_perkawinan;
        if ($request->filled('pekerjaan')) $updateData['pekerjaan'] = $request->pekerjaan;
        if ($request->filled('telepon')) $updateData['telepon'] = $request->telepon;
        if ($request->filled('email')) $updateData['email'] = $request->email;

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $penduduk->update($updateData);

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui!');
    }
}