<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        
        $statistik = [
            'total_pengajuan' => PengajuanSurat::count(),
            'menunggu' => PengajuanSurat::where('status', 'Menunggu Verifikasi')->count(),
            'diproses' => PengajuanSurat::where('status', 'Diproses')->count(),
            'selesai' => PengajuanSurat::where('status', 'Selesai')->count(),
            'ditolak' => PengajuanSurat::where('status', 'Ditolak')->count(),
            'total_penduduk' => Penduduk::count(),
        ];

        $pengajuanTerbaru = PengajuanSurat::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('admin', 'statistik', 'pengajuanTerbaru'));
    }
}