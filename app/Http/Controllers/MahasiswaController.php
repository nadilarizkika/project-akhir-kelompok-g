<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $nim = Auth::user()->nim;

        $pengajuan = Pengajuan::where('nim', $nim)
            ->latest()
            ->first();

        return view('mahasiswa.dashboard', compact('pengajuan'));
    }

    public function status()
    {
        $nim = Auth::user()->nim;

        $pengajuan = Pengajuan::where('nim', $nim)
            ->latest()
            ->first();

        return view('mahasiswa.status', compact('pengajuan'));
    }
}
