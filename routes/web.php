<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-admin', function () {
    return view('admin.login');
})->name('login.admin');

Route::get('/pengajuan', function () {
    return view('simpatik.pengajuan');
})->name('pengajuan.create');

Route::get('/informasi', function () {
    return view('simpatik.informasi');
})->name('informasi');
