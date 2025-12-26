<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Sesuaikan nama variabel dengan yang dipanggil di dashboard.blade.php
        $total_semua = Pengajuan::count();
        $total_masuk = Pengajuan::where('status', 'menunggu')->count();
        $total_disetujui = Pengajuan::where('status', 'disetujui')->count();
        $total_ditolak = Pengajuan::where('status', 'ditolak')->count();
        
        // Mengambil 5 pengajuan terbaru untuk tabel
        $pengajuan_terbaru = Pengajuan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'total_semua', 
            'total_masuk', 
            'total_disetujui', 
            'total_ditolak', 
            'pengajuan_terbaru'
        ));
    }

    public function mahasiswa()
    {
        // Mengambil daftar mahasiswa unik berdasarkan NIM
        $mahasiswa_list = Pengajuan::select('nama_mahasiswa', 'nim', 'program_studi')
                            ->distinct()
                            ->get();
                            
        return view('admin.mahasiswa', compact('mahasiswa_list'));
    }

    // Tambahkan fungsi ini agar rute admin.pengajuan tidak error
    public function indexPengajuan()
    {
        $semua_pengajuan = Pengajuan::latest()->get();
        return view('admin.pengajuan', compact('semua_pengajuan'));
    }
}