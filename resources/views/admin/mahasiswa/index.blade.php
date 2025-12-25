@extends('admin.layout')

@section('content')
<h4 class="mb-4">Data Mahasiswa</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Status KP</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $mhs)
                    @php
                        $pengajuan = $mhs->pengajuanKP->first();
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->program_studi }}</td>
                        <td>
                            @if (!$pengajuan)
                                <span class="badge bg-secondary">Belum Mengajukan</span>
                            @elseif ($pengajuan->status === 'menunggu')
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif ($pengajuan->status === 'disetujui')
                                <span class="badge bg-success">Disetujui</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Data mahasiswa belum ada
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
