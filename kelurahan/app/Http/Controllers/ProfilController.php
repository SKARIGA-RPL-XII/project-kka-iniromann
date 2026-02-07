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
            'telepon' => 'nullable|string|max:15',
            'email' => 'nullable|email|unique:penduduk,email,' . $penduduk->nik . ',nik',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $updateData = [
            'telepon' => $request->telepon,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $penduduk->update($updateData);

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui!');
    }
}