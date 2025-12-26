<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Pengajuan KP - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f8f6;
        }

        .navbar {
            background-color: #0f5132;
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
        }

        .status-card {
            border-left: 5px solid #198754;
            border-radius: 10px;
        }

        .badge-menunggu {
            background-color: #ffc107;
            color: #000;
        }

        .badge-disetujui {
            background-color: #198754;
        }

        .badge-ditolak {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand" href="{{ route('mahasiswa.dashboard') }}">
        SIMPATIK - Mahasiswa
    </a>
</nav>

<div class="container my-4">
    <h4 class="fw-bold text-success mb-4">Status Pengajuan Kerja Praktik</h4>

    <div class="card status-card shadow-sm">
        <div class="card-body">

            @if($pengajuan)
<table class="table table-bordered align-middle">
    <tr>
        <th>Nama Mahasiswa</th>
        <td>{{ $pengajuan->nama_mahasiswa }}</td>
    </tr>
    <tr>
        <th>NIM</th>
        <td>{{ $pengajuan->nim }}</td>
    </tr>
    <tr>
        <th>Program Studi</th>
        <td>{{ $pengajuan->program_studi }}</td>
    </tr>
    <tr>
        <th>Instansi Tujuan</th>
        <td>{{ $pengajuan->instansi_tujuan }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if($pengajuan->status == 'menunggu')
                <span class="badge bg-warning text-dark">Menunggu</span>
            @elseif($pengajuan->status == 'disetujui')
                <span class="badge bg-success">Disetujui</span>
            @else
                <span class="badge bg-danger">Ditolak</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Catatan Admin</th>
        <td>{{ $pengajuan->catatan_admin ?? '-' }}</td>
    </tr>
</table>
@else
<div class="alert alert-info">
    Anda belum memiliki pengajuan KP.
</div>
@endif


        </div>
    </div>
</div>

</body>
</html>
