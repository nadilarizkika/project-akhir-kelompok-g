<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $nim = Auth::user()->nim;

        // Di dashboard kita tetap tampilkan yang paling baru saja sebagai ringkasan
        $pengajuan = Pengajuan::where('nim', $nim)
            ->latest()
            ->first();

        return view('mahasiswa.dashboard', compact('pengajuan'));
    }

    public function status()
    {
        $nim = Auth::user()->nim;

        /**
         * PERBAIKAN:
         * Menggunakan ->get() agar mengambil SEMUA riwayat pengajuan.
         * Menggunakan nama variabel $pengajuans (jamak) agar sesuai dengan @forelse di blade.
         */
        $pengajuans = Pengajuan::where('nim', $nim)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mahasiswa.status', compact('pengajuans'));
    }
}