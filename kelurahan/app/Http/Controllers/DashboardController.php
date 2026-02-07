<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $penduduk = Auth::guard('penduduk')->user();
        $pengajuanTerbaru = PengajuanSurat::where('nik', $penduduk->nik)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        $statistik = [
            'total' => PengajuanSurat::where('nik', $penduduk->nik)->count(),
            'menunggu' => PengajuanSurat::where('nik', $penduduk->nik)->where('status', 'Menunggu Verifikasi')->count(),
            'diproses' => PengajuanSurat::where('nik', $penduduk->nik)->where('status', 'Diproses')->count(),
            'selesai' => PengajuanSurat::where('nik', $penduduk->nik)->where('status', 'Selesai')->count(),
        ];

        return view('dashboard', compact('penduduk', 'pengajuanTerbaru', 'statistik'));
    }
}