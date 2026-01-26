<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\WargaLoginController;
use App\Http\Controllers\Warga\DashboardController;
use App\Http\Controllers\Warga\ProfileController;
use App\Http\Controllers\Warga\PengajuanSuratController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VerifikasiController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Warga Authentication
Route::get('/login/warga', [WargaLoginController::class, 'showLoginForm'])->name('warga.login');
Route::post('/login/warga', [WargaLoginController::class, 'login']);
Route::get('/register/warga', [WargaLoginController::class, 'showRegistrationForm'])->name('warga.register');
Route::post('/register/warga', [WargaLoginController::class, 'register']);
Route::post('/logout/warga', [WargaLoginController::class, 'logout'])->name('warga.logout');

// Warga Routes (protected)
Route::middleware(['auth:warga'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Pengajuan Surat
    Route::get('/pengajuan-surat', [PengajuanSuratController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan-surat/create', [PengajuanSuratController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan-surat', [PengajuanSuratController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan-surat/{id}', [PengajuanSuratController::class, 'show'])->name('pengajuan.show');
    Route::get('/pengajuan-surat/{id}/download', [PengajuanSuratController::class, 'download'])->name('pengajuan.download');
    
    // Riwayat
    Route::get('/riwayat', [PengajuanSuratController::class, 'riwayat'])->name('riwayat');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Admin auth routes
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // Admin protected routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/pengajuan', [VerifikasiController::class, 'index'])->name('admin.pengajuan');
        Route::get('/pengajuan/{id}', [VerifikasiController::class, 'show'])->name('admin.pengajuan.show');
        Route::put('/pengajuan/{id}/verify', [VerifikasiController::class, 'verify'])->name('admin.pengajuan.verify');
        Route::put('/pengajuan/{id}/reject', [VerifikasiController::class, 'reject'])->name('admin.pengajuan.reject');
        Route::put('/pengajuan/{id}/process', [VerifikasiController::class, 'process'])->name('admin.pengajuan.process');
        Route::put('/pengajuan/{id}/complete', [VerifikasiController::class, 'complete'])->name('admin.pengajuan.complete');
        Route::post('/pengajuan/{id}/upload-surat', [VerifikasiController::class, 'uploadSurat'])->name('admin.pengajuan.upload-surat');
    });
});