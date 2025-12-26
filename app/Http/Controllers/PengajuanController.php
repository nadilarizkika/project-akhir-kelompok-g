<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    /**
     * TAMPILAN MAHASISWA
     */

    // Menampilkan formulir pengajuan surat KP
    public function create()
    {
        return view('pengajuan.create');
    }

    // Menyimpan data pengajuan baru dari mahasiswa ke database
    public function store(Request $request)
    {
        // Validasi data input mahasiswa
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'program_studi' => 'required|string',
            'instansi_tujuan' => 'required|string',
            'alamat_instansi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048' // Batas file 2MB
        ]);
        
        $filePath = null;
        if ($request->hasFile('surat_pengantar')) {
            // Menyimpan berkas di storage/app/public/surat_pengantar
            $filePath = $request->file('surat_pengantar')->store('surat_pengantar', 'public');
        }
        
        Pengajuan::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'instansi_tujuan' => $request->instansi_tujuan,
            'alamat_instansi' => $request->alamat_instansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'surat_pengantar' => $filePath,
            'status' => 'menunggu', // Status awal default adalah menunggu
        ]);
        
        return redirect('/')
            ->with('success', 'Pengajuan KP Anda berhasil dikirim dan sedang menunggu verifikasi.');
    }

    // Menampilkan Dashboard Status untuk Mahasiswa (Berdasarkan pencarian NIM)
    public function indexMahasiswa(Request $request)
    {
        $nim = $request->query('nim');
        // Mengambil histori pengajuan mahasiswa berdasarkan NIM
        $pengajuan = Pengajuan::where('nim', $nim)->latest()->get();

        return view('mahasiswa.dashboard', compact('pengajuan', 'nim'));
    }


    /**
     * TAMPILAN ADMIN
     */

    // Fitur Responsif: Memperbarui status via AJAX (Tanpa Reload)
    public function updateStatus(Request $request, $id)
    {
        // Mencari data pengajuan di database atau error 404 jika tidak ada
        $pengajuan = Pengajuan::findOrFail($id); 
        
        // Memperbarui kolom status (disetujui/ditolak)
        $pengajuan->update([
            'status' => $request->status 
        ]);

        // Mengembalikan respon JSON untuk ditangkap oleh AJAX di tampilan
        return response()->json([
            'success' => true,
            'message' => 'Status pengajuan ' . $pengajuan->nama_mahasiswa . ' berhasil diperbarui!'
        ]);
    }

    // Fungsi cadangan jika Admin ingin menyetujui secara manual (Halaman biasa)
    public function approve($id)
    {
        Pengajuan::findOrFail($id)->update(['status' => 'disetujui']);
        return back()->with('success', 'Pengajuan telah disetujui.');
    }

    // Fungsi cadangan jika Admin ingin menolak dengan menyertakan catatan khusus
    public function reject(Request $request, $id)
    {
        Pengajuan::findOrFail($id)->update([
            'status' => 'ditolak',
            'catatan_admin' => $request->catatan_admin
        ]);

        return back()->with('error', 'Pengajuan telah ditolak.');
    }
}