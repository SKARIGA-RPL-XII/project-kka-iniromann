<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPengajuanController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Penduduk
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth:penduduk')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');
    
    Route::get('/pengajuan', [PengajuanSuratController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/create', [PengajuanSuratController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan', [PengajuanSuratController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan/{id}', [PengajuanSuratController::class, 'show'])->name('pengajuan.show');
    Route::get('/pengajuan/{id}/edit', [PengajuanSuratController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{id}', [PengajuanSuratController::class, 'update'])->name('pengajuan.update');
    Route::delete('/pengajuan/{id}', [PengajuanSuratController::class, 'destroy'])->name('pengajuan.destroy');
    Route::get('/pengajuan/{id}/download', [PengajuanSuratController::class, 'download'])->name('pengajuan.download');
});

// Routes untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        
        Route::get('/pengajuan', [AdminPengajuanController::class, 'index'])->name('admin.pengajuan.index');
        Route::get('/pengajuan/create', [AdminPengajuanController::class, 'create'])->name('admin.pengajuan.create');
        Route::post('/pengajuan', [AdminPengajuanController::class, 'store'])->name('admin.pengajuan.store');
        Route::get('/pengajuan/{id}', [AdminPengajuanController::class, 'show'])->name('admin.pengajuan.show');
        Route::get('/pengajuan/{id}/edit', [AdminPengajuanController::class, 'edit'])->name('admin.pengajuan.edit');
        Route::put('/pengajuan/{id}', [AdminPengajuanController::class, 'update'])->name('admin.pengajuan.update');
        Route::delete('/pengajuan/{id}', [AdminPengajuanController::class, 'destroy'])->name('admin.pengajuan.destroy');
        Route::put('/pengajuan/{id}/status', [AdminPengajuanController::class, 'updateStatus'])->name('admin.pengajuan.updateStatus');
    });
});
