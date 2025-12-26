<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PengajuanController;
use App\Models\Pengajuan;

/*
|--------------------------------------------------------------------------
| 1. RUTE PUBLIK (MAHASISWA)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

// Jalur Pengiriman Data Mahasiswa
Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Jalur Cek Status (Dashboard Mahasiswa)
Route::get('/dashboard-mahasiswa', [PengajuanController::class, 'indexMahasiswa'])->name('mahasiswa.dashboard');

/*
|--------------------------------------------------------------------------
| 2. RUTE KHUSUS ADMIN (PREFIX: admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    
    // Guest: Hanya bisa diakses jika belum login
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('login.admin');
        Route::post('/login', [AdminLoginController::class, 'login']);
        Route::get('/register', [AdminLoginController::class, 'showRegister'])->name('admin.register');
        Route::post('/register', [AdminLoginController::class, 'register'])->name('admin.register.submit');
    });

    // Auth: Hanya bisa diakses setelah login admin sukses
    Route::middleware('auth:admin')->group(function () {
        
        // Dashboard Ringkasan dengan Data Real-time
        Route::get('/dashboard', function () {
            $pengajuan_terbaru = Pengajuan::latest()->take(5)->get();
            $total_masuk = Pengajuan::where('status', 'menunggu')->count();
            $total_disetujui = Pengajuan::where('status', 'disetujui')->count();

            return view('admin.dashboard', compact('pengajuan_terbaru', 'total_masuk', 'total_disetujui'));
        })->name('admin.dashboard');

        // Manajemen Pengajuan (Daftar Seluruh Berkas)
        Route::get('/pengajuan', function () {
            $semua_pengajuan = Pengajuan::latest()->get();
            return view('admin.pengajuan', compact('semua_pengajuan'));
        })->name('admin.pengajuan');

        // FITUR RESPONSIF: Update Status (AJAX)
        Route::post('/pengajuan/{id}/update-status', [PengajuanController::class, 'updateStatus'])->name('admin.pengajuan.update');

        // Manajemen Mahasiswa (Daftar Unik Berdasarkan NIM)
        Route::get('/mahasiswa', function () {
            $mahasiswa_list = Pengajuan::select('nama_mahasiswa', 'nim', 'program_studi')
                                ->distinct('nim')
                                ->get();
            return view('admin.mahasiswa', compact('mahasiswa_list'));
        })->name('admin.mahasiswa');

        // Keamanan: Logout & Password
        Route::post('/update-password', [AdminLoginController::class, 'updatePassword'])->name('admin.password.update');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});