<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'total' => Pengajuan::count(),
            'menunggu' => Pengajuan::where('status', 'menunggu')->count(),
            'disetujui' => Pengajuan::where('status', 'disetujui')->count(),
            'ditolak' => Pengajuan::where('status', 'ditolak')->count(),
            'pengajuan' => Pengajuan::latest()->take(5)->get()  // 5 pengajuan terbaru
        ]);
    }

    // Menampilkan Data Mahasiswa
    public function dataMahasiswa()
    {
        return view('admin.data-mahasiswa');  // Pastikan file view-nya ada
    }

    // Menampilkan Laporan
    public function laporan()
    {
        return view('admin.laporan');  // Pastikan file view-nya ada
    }
}