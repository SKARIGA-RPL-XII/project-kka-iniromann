<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanController extends Controller
{
    // Show all pengajuan by warga
    public function index()
    {
        $pengajuan = Pengajuan::with('surat')
            ->where('warga_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('pengajuan.index', compact('pengajuan'));
    }

    // Show create form
    public function create()
    {
        $surat = Surat::all();
        return view('pengajuan.create', compact('surat'));
    }

    // Store new pengajuan
    public function store(Request $request)
    {
        $request->validate([
            'surat_id' => 'required|exists:surat,id',
            'tujuan' => 'required|string',
            'file_ktp' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'file_kk' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'file_pengantar' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Generate nomor pengajuan
        $nomorPengajuan = 'SRT-' . date('Ymd') . '-' . Str::random(6);

        // Upload files
        $fileKtpPath = $request->file('file_ktp')->store('berkas/ktp', 'public');
        $fileKkPath = $request->file('file_kk')->store('berkas/kk', 'public');
        
        $filePengantarPath = null;
        if ($request->hasFile('file_pengantar')) {
            $filePengantarPath = $request->file('file_pengantar')->store('berkas/pengantar', 'public');
        }

        // Create pengajuan
        Pengajuan::create([
            'warga_id' => Auth::id(),
            'surat_id' => $request->surat_id,
            'nomor_pengajuan' => $nomorPengajuan,
            'tujuan' => $request->tujuan,
            'tanggal_pengajuan' => now(),
            'file_ktp' => $fileKtpPath,
            'file_kk' => $fileKkPath,
            'file_pengantar' => $filePengantarPath,
            'status' => 'menunggu',
        ]);

        Alert::success('Success', 'Pengajuan berhasil dikirim!');
        return redirect()->route('pengajuan.index');
    }

    // Show detail pengajuan
    public function show($id)
    {
        $pengajuan = Pengajuan::with(['surat', 'warga'])
            ->where('id', $id)
            ->where('warga_id', Auth::id())
            ->firstOrFail();
        
        return view('pengajuan.show', compact('pengajuan'));
    }

    // Download surat jika sudah selesai
    public function download($id)
    {
        $pengajuan = Pengajuan::with(['surat', 'warga'])
            ->where('id', $id)
            ->where('warga_id', Auth::id())
            ->firstOrFail();

        if ($pengajuan->status !== 'selesai') {
            Alert::error('Error', 'Surat belum selesai diproses');
            return back();
        }

        // Generate PDF
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('surat.template', compact('pengajuan'));
        
        return $pdf->download('Surat-' . $pengajuan->nomor_pengajuan . '.pdf');
    }
}