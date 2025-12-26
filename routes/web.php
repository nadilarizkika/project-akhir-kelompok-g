<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController; // Tambahkan ini
use App\Http\Controllers\PengajuanController;

/*
|--------------------------------------------------------------------------
| 1. RUTE PUBLIK (MAHASISWA)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

// Jalur Pengajuan Mahasiswa
Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('/dashboard-mahasiswa', [PengajuanController::class, 'indexMahasiswa'])->name('mahasiswa.dashboard');

/*
|--------------------------------------------------------------------------
| 2. RUTE KHUSUS ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    
    // Guest: Belum Login
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('login.admin');
        Route::post('/login', [AdminLoginController::class, 'login']);
        
        // Pastikan nama method di Controller adalah showRegister
        Route::get('/register', [AdminLoginController::class, 'showRegister'])->name('admin.register');
        Route::post('/register', [AdminLoginController::class, 'register'])->name('admin.register.submit');
    });

    // Auth: Sudah Login
    Route::middleware('auth:admin')->group(function () {
        
        // Pindahkan logika Dashboard ke AdminController agar lebih rapi
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Manajemen Pengajuan
        Route::get('/pengajuan', [AdminController::class, 'indexPengajuan'])->name('admin.pengajuan');
        Route::post('/pengajuan/{id}/update-status', [PengajuanController::class, 'updateStatus'])->name('admin.pengajuan.update');

        // Manajemen Mahasiswa
        Route::get('/mahasiswa', [AdminController::class, 'mahasiswa'])->name('admin.mahasiswa');

        // Keamanan
        Route::post('/update-password', [AdminLoginController::class, 'updatePassword'])->name('admin.password.update');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});