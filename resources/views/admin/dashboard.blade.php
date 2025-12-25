<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f8f6;
        }

        /* WRAPPER UTAMA */
        .app {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .navbar {
            background-color: #0f5132;
        }

        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
        }

        /* MAIN */
        .main-wrapper {
            flex: 1;
            display: flex;
            overflow: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            color: #0f5132;
            font-weight: 500;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #e9f5ef;
            border-left: 4px solid #198754;
        }

        .sidebar-menu {
            flex-grow: 1;
        }

        /* CONTENT */
        .content {
            flex: 1;
            padding: 25px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        /* CARD STAT */
        .card-stat {
            border-left: 5px solid #198754;
            border-radius: 10px;
        }

        .card-stat h5 {
            color: #0f5132;
        }

        /* FOOTER */
        .content-footer {
            margin-top: auto;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            padding-top: 15px;
        }
    </style>
</head>
<body>

<div class="app">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark px-4">
        <a class="navbar-brand" href="#">
            SIMPATIK - Admin
        </a>
    </nav>

    <!-- MAIN -->
    <div class="main-wrapper">

        <!-- SIDEBAR -->
        <div class="sidebar">

            <div class="sidebar-menu">
                <a href="/admin/dashboard" class="active">Dashboard</a>
                <a href="/admin/pengajuan">Data Pengajuan KP</a>
                <a href="/admin/mahasiswa">Data Mahasiswa</a>
                <a href="/admin/laporan">Laporan</a>
            </div>

            <!-- LOGOUT PALING BAWAH -->
            <div class="p-3 border-top">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        Logout
                    </button>
                </form>
            </div>

        </div>

        <!-- CONTENT -->
        <div class="content">

            <h4 class="fw-bold text-success mb-4">Dashboard Admin</h4>

            <!-- STATISTIK -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card card-stat shadow-sm">
                        <div class="card-body">
                            <h5>Total Pengajuan</h5>
                            <h2 class="fw-bold">{{ $total }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-stat shadow-sm">
                        <div class="card-body">
                            <h5>Menunggu Persetujuan</h5>
                            <h2 class="fw-bold">{{ $menunggu }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-stat shadow-sm">
                        <div class="card-body">
                            <h5>Disetujui</h5>
                            <h2 class="fw-bold">{{ $disetujui }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABEL -->
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold text-success">
                    Pengajuan KP Terbaru
                </div>
                <div class="card-body">
                    <table class="table table-bordered align-middle">
                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Instansi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuan as $index => $p)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $p->nama_mahasiswa }}</td>
    <td>{{ $p->nim }}</td>
    <td>{{ $p->instansi_tujuan }}</td>
    <td>
        <span class="badge bg-{{ $p->status == 'menunggu' ? 'warning' : ($p->status == 'disetujui' ? 'success' : 'danger') }}">
            {{ ucfirst($p->status) }}
        </span>
    </td>
    <td>
        @if($p->status == 'menunggu')
        <form action="{{ route('admin.pengajuan.approve', $p->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
        </form>
        <form action="{{ route('admin.pengajuan.reject', $p->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
        </form>
        @else
        <span class="text-muted">Tidak bisa diubah</span>
        @endif
    </td>
</tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="content-footer">
                © {{ date('Y') }} SIMPATIK - UIN
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
