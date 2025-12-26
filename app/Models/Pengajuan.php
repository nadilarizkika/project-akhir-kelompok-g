<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    // Sesuaikan nama tabel dengan migration (tambah huruf 's')
    protected $table = 'pengajuans'; 

    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'program_studi',
        'instansi_tujuan',
        'alamat_instansi',
        'tanggal_mulai',
        'tanggal_selesai',
        'surat_pengantar',
        'status',
        'catatan_admin',
        'surat_balasan',
    ];
}