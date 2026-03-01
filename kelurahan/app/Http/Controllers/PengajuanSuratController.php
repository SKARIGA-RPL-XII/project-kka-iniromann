<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $penduduk = Auth::guard('penduduk')->user();
        $pengajuan = PengajuanSurat::where('nik', $penduduk->nik)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        return view('pengajuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|in:SKTM,Domisili,SKU,Keterangan Usaha,Keterangan Tidak Mampu',
            'keperluan' => 'required|string',
            'berkas.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $penduduk = Auth::guard('penduduk')->user();
        $berkasPendukung = [];

        if ($request->hasFile('berkas')) {
            foreach ($request->file('berkas') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('berkas', $filename, 'public');
                $berkasPendukung[] = $path;
            }
        }

        PengajuanSurat::create([
            'nomor_pengajuan' => PengajuanSurat::generateNomorPengajuan(),
            'nik' => $penduduk->nik,
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
            'berkas_pendukung' => $berkasPendukung,
            'status' => 'Menunggu Verifikasi'
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan surat berhasil disubmit!');
    }

    public function show($id)
    {
        $penduduk = Auth::guard('penduduk')->user();
        $pengajuan = PengajuanSurat::where('id', $id)
            ->where('nik', $penduduk->nik)
            ->firstOrFail();

        return view('pengajuan.show', compact('pengajuan'));
    }

    public function edit($id)
    {
        $penduduk = Auth::guard('penduduk')->user();
        $pengajuan = PengajuanSurat::where('id', $id)
            ->where('nik', $penduduk->nik)
            ->where('status', 'Menunggu Verifikasi')
            ->firstOrFail();

        return view('pengajuan.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $penduduk = Auth::guard('penduduk')->user();
        $pengajuan = PengajuanSurat::where('id', $id)
            ->where('nik', $penduduk->nik)
            ->where('status', 'Menunggu Verifikasi')
            ->firstOrFail();

        $request->validate([
            'jenis_surat' => 'required|in:SKTM,Domisili,SKU,Keterangan Usaha,Keterangan Tidak Mampu',
            'keperluan' => 'required|string',
            'berkas.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $berkasPendukung = $pengajuan->berkas_pendukung ?? [];

        if ($request->hasFile('berkas')) {
            if ($pengajuan->berkas_pendukung) {
                foreach ($pengajuan->berkas_pendukung as $oldFile) {
                    Storage::disk('public')->delete($oldFile);
                }
            }
            
            $berkasPendukung = [];
            foreach ($request->file('berkas') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('berkas', $filename, 'public');
                $berkasPendukung[] = $path;
            }
        }

        $pengajuan->update([
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
            'berkas_pendukung' => $berkasPendukung,
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan surat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penduduk = Auth::guard('penduduk')->user();
        $pengajuan = PengajuanSurat::where('id', $id)
            ->where('nik', $penduduk->nik)
            ->where('status', 'Menunggu Verifikasi')
            ->firstOrFail();

        if ($pengajuan->berkas_pendukung) {
            foreach ($pengajuan->berkas_pendukung as $file) {
                Storage::disk('public')->delete($file);
            }
        }

        $pengajuan->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan surat berhasil dihapus!');
    }

    public function download($id)
    {
        $penduduk = Auth::guard('penduduk')->user();
        $pengajuan = PengajuanSurat::where('id', $id)
            ->where('nik', $penduduk->nik)
            ->where('status', 'Selesai')
            ->firstOrFail();

        if (!$pengajuan->file_surat) {
            return back()->with('error', 'File surat belum tersedia.');
        }

        return Storage::disk('public')->download($pengajuan->file_surat);
    }
}