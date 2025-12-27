<?php

namespace App\Exports;

use App\Models\Pengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengajuanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pengajuan::select(
            'nama_mahasiswa',
            'nim',
            'instansi_tujuan',
            'status',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama Mahasiswa',
            'NIM',
            'Instansi Tujuan',
            'Status',
            'Tanggal Pengajuan'
        ];
    }
}
