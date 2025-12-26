<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa - SIMPATIK</title>

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

        .sidebar {
            background-color: #ffffff;
            min-height: 100vh;
            border-right: 1px solid #dee2e6;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #0f5132;
            font-weight: 500;
            text-decoration: none;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #e9f5ef;
            border-left: 4px solid #198754;
        }

        .card-info {
            border-left: 5px solid #198754;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand" href="#">SIMPATIK - Mahasiswa</a>

    <form action="{{ route('mahasiswa.logout') }}" method="POST">
        @csrf
        <button class="btn btn-sm btn-light">Logout</button>
    </form>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar px-0">
            <a href="{{ route('mahasiswa.dashboard') }}" class="active">Dashboard</a>
            <a href="{{ route('mahasiswa.status') }}">Status Pengajuan KP</a>
        </div>

        <!-- CONTENT -->
        <div class="col-md-10 p-4">
            <h4 class="fw-bold text-success mb-4">
                Selamat Datang, {{ Auth::user()->name }}
            </h4>

            @if($pengajuan)
<div class="row">
    <div class="col-md-4">
        <div class="card card-info shadow-sm">
            <div class="card-body">
                <h6>Status Pengajuan</h6>

                @if($pengajuan->status == 'menunggu')
                    <h5 class="fw-bold text-warning">Menunggu</h5>
                @elseif($pengajuan->status === 'disetujui' && $pengajuan->surat_balasan)
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card card-info shadow-sm">
            <div class="card-body">
                <h6>Surat Balasan Admin</h6>

                <p class="text-muted mb-3" style="font-size: 14px;">
                    Pengajuan Kerja Praktik Anda telah <b class="text-success">disetujui</b>.
                    Silakan unduh surat balasan resmi dari fakultas.
                </p>

                <a href="{{ asset('storage/'.$pengajuan->surat_balasan) }}"
                   class="btn btn-success btn-sm"
                   target="_blank">
                   <i class="fa-solid fa-file-pdf me-1"></i> Unduh Surat Balasan
                </a>
            </div>
        </div>
    </div>
</div>
                @else
                    <h5 class="fw-bold text-danger">Ditolak</h5>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-info shadow-sm">
            <div class="card-body">
                <h6>Instansi KP</h6>
                <h5 class="fw-bold">{{ $pengajuan->instansi_tujuan }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-info shadow-sm">
            <div class="card-body">
                <h6>Periode KP</h6>
                <h5 class="fw-bold">
                    {{ $pengajuan->tanggal_mulai }} s/d {{ $pengajuan->tanggal_selesai }}
                </h5>
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-info">
    Anda belum mengajukan Kerja Praktik.
</div>
@endif


        </div>
    </div>
</div>

</body>
</html>
