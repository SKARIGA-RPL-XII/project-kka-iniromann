<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Berkas;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WargaController extends Controller
{
    // Dashboard warga
    public function dashboard()
    {
        $warga = Auth::user()->warga;
        $surat_terbaru = Surat::where('warga_id', $warga->id)
            ->latest()
            ->take(5)
            ->get();
        
        $statistik = [
            'total' => Surat::where('warga_id', $warga->id)->count(),
            'menunggu' => Surat::where('warga_id', $warga->id)
                ->where('status', 'menunggu_verifikasi')
                ->count(),
            'diproses' => Surat::where('warga_id', $warga->id)
                ->where('status', 'diproses')
                ->count(),
            'selesai' => Surat::where('warga_id', $warga->id)
                ->where('status', 'selesai')
                ->count(),
        ];

        return view('warga.dashboard', compact('warga', 'surat_terbaru', 'statistik'));
    }

    // Update profil
    public function updateProfile(Request $request)
    {
        $warga = Auth::user()->warga;
        
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email|unique:wargas,email,' . $warga->id,
            'telepon' => 'nullable|string|max:15',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['email', 'telepon']);

        // Upload foto KTP
        if ($request->hasFile('foto_ktp')) {
            if ($warga->foto_ktp) {
                Storage::delete('public/' . $warga->foto_ktp);
            }
            $path = $request->file('foto_ktp')->store('uploads/ktp', 'public');
            $data['foto_ktp'] = $path;
        }

        // Upload foto KK
        if ($request->hasFile('foto_kk')) {
            if ($warga->foto_kk) {
                Storage::delete('public/' . $warga->foto_kk);
            }
            $path = $request->file('foto_kk')->store('uploads/kk', 'public');
            $data['foto_kk'] = $path;
        }

        $warga->update($data);

        return redirect()->back()
            ->with('success', 'Profil berhasil diperbarui.');
    }

    // Form pengajuan surat
    public function createSurat()
    {
        $jenis_surat = [
            'SKTM' => 'Surat Keterangan Tidak Mampu',
            'Surat Domisili' => 'Surat Keterangan Domisili',
            'SKU' => 'Surat Keterangan Usaha',
            'Surat Keterangan Tidak Mampu' => 'Surat Keterangan Tidak Mampu',
            'Surat Keterangan Usaha' => 'Surat Keterangan Usaha',
            'Surat Pengantar' => 'Surat Pengantar',
            'Surat Keterangan Kelahiran' => 'Surat Keterangan Kelahiran',
            'Surat Kematian' => 'Surat Keterangan Kematian'
        ];

        return view('warga.surat.create', compact('jenis_surat'));
    }

    // Simpan pengajuan surat
    public function storeSurat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_surat' => 'required|string',
            'keperluan' => 'required|string|min:10',
            'berkas.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'jenis_berkas.*' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $warga = Auth::user()->warga;

        // Buat data surat
        $surat = Surat::create([
            'warga_id' => $warga->id,
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
            'tanggal_pengajuan' => now(),
            'status' => 'menunggu_verifikasi'
        ]);

        // Generate nomor surat otomatis
        $nomor_surat = $this->generateNomorSurat($surat);
        $surat->update(['nomor_surat' => $nomor_surat]);

        // Upload berkas
        if ($request->hasFile('berkas')) {
            foreach ($request->file('berkas') as $index => $file) {
                $jenis = $request->jenis_berkas[$index];
                $path = $file->store("uploads/berkas/{$surat->id}", 'public');
                
                Berkas::create([
                    'surat_id' => $surat->id,
                    'jenis_berkas' => $jenis,
                    'nama_file' => $file->getClientOriginalName(),
                    'path' => $path,
                    'tipe_file' => $file->getMimeType(),
                    'ukuran_file' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('warga.surat.riwayat')
            ->with('success', 'Pengajuan surat berhasil dikirim. Status: Menunggu Verifikasi.');
    }

    // Riwayat surat
    public function riwayatSurat()
    {
        $warga = Auth::user()->warga;
        $surats = Surat::where('warga_id', $warga->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('warga.surat.riwayat', compact('surats'));
    }

    // Detail surat
    public function detailSurat($id)
    {
        $surat = Surat::with('berkas')->findOrFail($id);
        
        // Cek kepemilikan
        if ($surat->warga_id !== Auth::user()->warga->id) {
            abort(403, 'Akses ditolak.');
        }

        return view('warga.surat.detail', compact('surat'));
    }

    // Download surat
    public function downloadSurat($id)
    {
        $surat = Surat::findOrFail($id);
        
        // Cek kepemilikan
        if ($surat->warga_id !== Auth::user()->warga->id) {
            abort(403, 'Akses ditolak.');
        }

        if ($surat->status !== 'selesai' || !$surat->file_surat) {
            return redirect()->back()
                ->with('error', 'Surat belum tersedia untuk diunduh.');
        }

        $path = storage_path('app/public/' . $surat->file_surat);
        
        if (!file_exists($path)) {
            return redirect()->back()
                ->with('error', 'File surat tidak ditemukan.');
        }

        return response()->download($path, "Surat-{$surat->nomor_surat}.pdf");
    }

    // Helper function untuk generate nomor surat
    private function generateNomorSurat($surat)
    {
        $year = date('Y');
        $month = date('m');
        $jenis_kode = [
            'SKTM' => 'SKTM',
            'Surat Domisili' => 'DOM',
            'SKU' => 'SKU',
            'Surat Keterangan Tidak Mampu' => 'SKTM',
            'Surat Keterangan Usaha' => 'SKU',
            'Surat Pengantar' => 'SP',
            'Surat Keterangan Kelahiran' => 'SKK',
            'Surat Kematian' => 'SKM'
        ];

        $kode = $jenis_kode[$surat->jenis_surat] ?? 'SUR';
        $count = Surat::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count() + 1;

        return "{$kode}/{$count}/{$surat->warga->rt}/{$surat->warga->rw}/{$month}/{$year}";
    }
}