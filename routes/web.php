<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\MahasiswaLoginController;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| 1. RUTE PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| 2. RUTE MAHASISWA (PUBLIK & AUTH)
|--------------------------------------------------------------------------
*/

// ===== FORM PENGAJUAN KP =====
Route::middleware('auth')->group(function () {
    Route::get('/pengajuan', [PengajuanController::class, 'create'])
        ->name('pengajuan.create');

    Route::post('/pengajuan', [PengajuanController::class, 'store'])
        ->name('pengajuan.store');
});



// ===== LOGIN MAHASISWA =====
Route::get('/mahasiswa/login', [MahasiswaLoginController::class, 'showLogin'])
    ->name('mahasiswa.login');

Route::post('/mahasiswa/login', [MahasiswaLoginController::class, 'login'])
    ->name('mahasiswa.login.post');

Route::get('/mahasiswa/register', [MahasiswaLoginController::class, 'showRegister'])
    ->name('mahasiswa.register');

Route::post('/mahasiswa/register', [MahasiswaLoginController::class, 'register'])
    ->name('mahasiswa.register.submit');

Route::post('/mahasiswa/logout', [MahasiswaLoginController::class, 'logout'])
    ->name('mahasiswa.logout');


// ===== DASHBOARD MAHASISWA (AUTH) =====
Route::middleware('auth')->group(function () {

    Route::get('/mahasiswa/dashboard',
        [MahasiswaController::class, 'dashboard']
    )->name('mahasiswa.dashboard');

    Route::get('/mahasiswa/status-pengajuan',
        [MahasiswaController::class, 'status']
    )->name('mahasiswa.status');
});


/*
|--------------------------------------------------------------------------
| 3. RUTE ADMIN (GUARD ADMIN)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    /*
    |----------------------------------------------------------------------
    | ADMIN - BELUM LOGIN (GUEST)
    |----------------------------------------------------------------------
    */
    Route::middleware('guest:admin')->group(function () {

        // Login
        Route::get('/login', [AdminLoginController::class, 'showLogin'])
            ->name('login.admin');

        Route::post('/login', [AdminLoginController::class, 'login'])
            ->name('admin.login.submit');

        // Register (TIDAK DIHAPUS ✅)
        Route::get('/register', [AdminLoginController::class, 'showRegister'])
            ->name('admin.register');

        Route::post('/register', [AdminLoginController::class, 'register'])
            ->name('admin.register.submit');
    });

    /*
    |----------------------------------------------------------------------
    | ADMIN - SUDAH LOGIN (AUTH)
    |----------------------------------------------------------------------
    */
    Route::middleware('auth:admin')->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        // Data Pengajuan KP
        Route::get('/pengajuan', [AdminController::class, 'indexPengajuan'])
            ->name('admin.pengajuan');

        Route::post('/pengajuan/{id}/update-status',
            [PengajuanController::class, 'updateStatus']
        )->name('admin.pengajuan.update');

        // Data Mahasiswa
        Route::get('/mahasiswa', [AdminController::class, 'mahasiswa'])
            ->name('admin.mahasiswa');

        // Update Password Admin
        Route::post('/update-password',
            [AdminLoginController::class, 'updatePassword']
        )->name('admin.password.update');

        // Logout Admin
        Route::post('/logout', [AdminLoginController::class, 'logout'])
            ->name('admin.logout');
    });
});
