<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdminLoginController;

Route::get('/', function () {
    return view('welcome');
});

// Pengajuan
Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Admin login
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('login.admin');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Dashboard Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// **Tambah Route untuk Data Pengajuan KP**
Route::get('/admin/pengajuan', [PengajuanController::class, 'index'])->name('admin.pengajuan');

// Admin - Setujui Pengajuan
Route::post('/admin/pengajuan/approve/{id}', [PengajuanController::class, 'approve'])->name('admin.pengajuan.approve');

// Admin - Tolak Pengajuan
Route::post('/admin/pengajuan/reject/{id}', [PengajuanController::class, 'reject'])->name('admin.pengajuan.reject');

// **Menambahkan Route untuk Data Mahasiswa dan Laporan**
Route::get('/admin/data-mahasiswa', [AdminController::class, 'dataMahasiswa'])->name('data_mahasiswa');
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('laporan');