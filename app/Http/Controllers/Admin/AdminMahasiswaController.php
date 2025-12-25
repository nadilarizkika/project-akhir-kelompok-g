<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;

class AdminMahasiswaController extends Controller
{
    public function index()
{
    $mahasiswa = Mahasiswa::with('pengajuanKP')->get();
    return view('admin.mahasiswa.index', compact('mahasiswa'));
}
}
