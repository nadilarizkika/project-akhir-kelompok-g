<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanKP extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'instansi',
        'alamat_instansi',
        'tgl_mulai',
        'tgl_selesai',
        'surat_pengantar',
        'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
