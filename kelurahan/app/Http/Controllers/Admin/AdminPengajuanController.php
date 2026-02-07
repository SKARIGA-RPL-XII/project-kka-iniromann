<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPengajuanController extends Controller
{
    public function index(Request $request)
    {
        $query = PengajuanSurat::with('penduduk');
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nomor_pengajuan', 'like', '%' . $request->search . '%')
                  ->orWhere('nik', 'like', '%' . $request->search . '%')
                  ->orWhereHas('penduduk', function($subQ) use ($request) {
                      $subQ->where('nama', 'like', '%' . $request->search . '%');
                  });
            });
        }
        
        $pengajuan = $query->orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.pengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        $penduduk = Penduduk::orderBy('nama')->get();
        return view('admin.pengajuan.create', compact('penduduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:penduduk,nik',
            'jenis_surat' => 'required|in:SKTM,Domisili,SKU,Keterangan Usaha,Keterangan Tidak Mampu',
            'keperluan' => 'required|string',
            'status' => 'required|in:Menunggu Verifikasi,Diproses,Selesai,Ditolak',
            'catatan_admin' => 'nullable|string',
            'berkas.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_surat' => 'nullable|file|mimes:pdf|max:5120'
        ]);

        $berkasPendukung = [];
        if ($request->hasFile('berkas')) {
            foreach ($request->file('berkas') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('berkas', $filename, 'public');
                $berkasPendukung[] = $path;
            }
        }

        $data = [
            'nomor_pengajuan' => PengajuanSurat::generateNomorPengajuan(),
            'nik' => $request->nik,
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
            'berkas_pendukung' => $berkasPendukung,
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ];

        if ($request->status == 'Selesai') {
            $data['tanggal_selesai'] = now();
            
            if ($request->hasFile('file_surat')) {
                $filename = 'surat_' . time() . '.pdf';
                $path = $request->file('file_surat')->storeAs('surat', $filename, 'public');
                $data['file_surat'] = $path;
            }
        }

        PengajuanSurat::create($data);

        return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan surat berhasil dibuat!');
    }

    public function show($id)
    {
        $pengajuan = PengajuanSurat::with('penduduk')->findOrFail($id);
        return view('admin.pengajuan.show', compact('pengajuan'));
    }

    public function edit($id)
    {
        $pengajuan = PengajuanSurat::with('penduduk')->findOrFail($id);
        $penduduk = Penduduk::orderBy('nama')->get();
        return view('admin.pengajuan.edit', compact('pengajuan', 'penduduk'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        
        $request->validate([
            'nik' => 'required|exists:penduduk,nik',
            'jenis_surat' => 'required|in:SKTM,Domisili,SKU,Keterangan Usaha,Keterangan Tidak Mampu',
            'keperluan' => 'required|string',
            'status' => 'required|in:Menunggu Verifikasi,Diproses,Selesai,Ditolak',
            'catatan_admin' => 'nullable|string',
            'berkas.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_surat' => 'nullable|file|mimes:pdf|max:5120'
        ]);

        $berkasPendukung = $pengajuan->berkas_pendukung ?? [];
        if ($request->hasFile('berkas')) {
            // Delete old files
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

        $updateData = [
            'nik' => $request->nik,
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
            'berkas_pendukung' => $berkasPendukung,
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ];

        if ($request->status == 'Selesai') {
            $updateData['tanggal_selesai'] = now();
            
            if ($request->hasFile('file_surat')) {
                // Delete old file
                if ($pengajuan->file_surat) {
                    Storage::disk('public')->delete($pengajuan->file_surat);
                }
                
                $filename = 'surat_' . $pengajuan->nomor_pengajuan . '.pdf';
                $path = $request->file('file_surat')->storeAs('surat', $filename, 'public');
                $updateData['file_surat'] = $path;
            }
        } elseif ($pengajuan->status == 'Selesai' && $request->status != 'Selesai') {
            // Reset completion data if status changed from Selesai
            $updateData['tanggal_selesai'] = null;
        }

        $pengajuan->update($updateData);

        return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan surat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        
        // Delete associated files
        if ($pengajuan->berkas_pendukung) {
            foreach ($pengajuan->berkas_pendukung as $file) {
                Storage::disk('public')->delete($file);
            }
        }
        
        if ($pengajuan->file_surat) {
            Storage::disk('public')->delete($pengajuan->file_surat);
        }
        
        $pengajuan->delete();
        
        return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan surat berhasil dihapus!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu Verifikasi,Diproses,Selesai,Ditolak',
            'catatan_admin' => 'nullable|string',
            'file_surat' => 'nullable|file|mimes:pdf|max:5120'
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);
        
        $updateData = [
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ];

        if ($request->status == 'Selesai') {
            $updateData['tanggal_selesai'] = now();
            
            if ($request->hasFile('file_surat')) {
                $filename = 'surat_' . $pengajuan->nomor_pengajuan . '.pdf';
                $path = $request->file('file_surat')->storeAs('surat', $filename, 'public');
                $updateData['file_surat'] = $path;
            }
        }

        $pengajuan->update($updateData);

        return back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }
}