<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdminLoginController;

Route::get('/', function () {
    return view('welcome');
});

// pengajuan
Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

// admin login
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('login.admin');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
// routes/web.php
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');

// dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');