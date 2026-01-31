<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\Auth\WargaLoginController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [WargaLoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [WargaLoginController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');
Route::post('/password/email', function () {
    return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
})->name('password.email');
Route::get('/password/reset/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');
Route::post('/password/reset', function () {
    return redirect()->route('login')->with('status', 'Password berhasil direset.');
})->name('password.update');

// Warga Routes (require authentication)
Route::middleware(['auth', 'warga'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [WargaController::class, 'dashboard'])->name('warga.dashboard');
    
    // Profile
    Route::get('/profile', [WargaController::class, 'showProfile'])->name('warga.profil');
    Route::post('/profile/update', [WargaController::class, 'updateProfile'])->name('warga.profil.update');
    
    // Surat
    Route::prefix('surat')->group(function () {
        Route::get('/create', [WargaController::class, 'createSurat'])->name('warga.surat.create');
        Route::post('/store', [WargaController::class, 'storeSurat'])->name('warga.surat.store');
        Route::get('/riwayat', [WargaController::class, 'riwayatSurat'])->name('warga.surat.riwayat');
        Route::get('/{id}', [WargaController::class, 'detailSurat'])->name('warga.surat.detail');
        Route::get('/{id}/download', [WargaController::class, 'downloadSurat'])->name('warga.surat.download');
    });
});

// Admin Routes (you can expand this section)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Add more admin routes here
});

// Home
Route::get('/', function () {
    return redirect()->route('login');
});