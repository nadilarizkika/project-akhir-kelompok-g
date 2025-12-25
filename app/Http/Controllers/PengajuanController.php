<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    // Menampilkan form pengajuan
    public function create()
    {
        return view('pengajuan.create');
    }

    // Menyimpan data pengajuan
    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'program_studi' => 'required',
            'instansi_tujuan' => 'required',
            'alamat_instansi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'surat_pengantar' => 'nullable|file|mimes:pdf|max:2048', // Validasi file PDF
        ]);
        
        // Menyimpan file surat pengantar jika ada
        $filePath = null;
        if ($request->hasFile('surat_pengantar')) {
            $filePath = $request->file('surat_pengantar')->store('surat_pengantar', 'public'); // Menyimpan file
        }
        
        // Menyimpan data pengajuan ke database
        Pengajuan::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'instansi_tujuan' => $request->instansi_tujuan,
            'alamat_instansi' => $request->alamat_instansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'surat_pengantar' => $filePath,
        ]);
        
        // Redirect dengan pesan sukses
        return redirect()->route('pengajuan.create')->with('success', 'Pengajuan berhasil dikirim');
    }

    // Menampilkan daftar pengajuan (untuk admin)
    public function index()
    {
        $pengajuan = Pengajuan::all(); // Ambil semua data pengajuan
        return view('admin.pengajuan.index', compact('pengajuan')); // Kirim data ke view admin
    }

    // Menyetujui pengajuan
    public function approve($id)
    {
        Pengajuan::findOrFail($id)->update([
            'status' => 'disetujui'
        ]);

        return back();
    }

    // Menolak pengajuan
    public function reject(Request $request, $id)
    {
        Pengajuan::findOrFail($id)->update([
            'status' => 'ditolak',
            'catatan_admin' => $request->catatan_admin
        ]);

        return back();
    }
}
