<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan — SIMPATIK UINSU</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --deep-forest: #042f2e;
            --emerald-accent: #10b981;
            --soft-green: #f0fdf4;
            --sidebar-width: 260px;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --danger-red: #ef4444;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fcfcfc;
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.06);
            padding: 10px 30px;
            z-index: 1050;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.3rem;
            color: var(--deep-forest) !important;
        }

        /* SIDEBAR DENGAN TOMBOL KELUAR DI BAWAH */
        .sidebar {
            width: var(--sidebar-width);
            background: white;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            padding-top: 80px;
            border-right: 1px solid rgba(0,0,0,0.06);
            z-index: 1000;
        }

        .sidebar-content {
            flex-grow: 1;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            margin: 4px 16px;
            border-radius: 12px;
            transition: 0.2s ease;
        }

        .sidebar-link i { width: 24px; font-size: 1.1rem; margin-right: 10px; }
        .sidebar-link:hover { background: var(--soft-green); color: var(--deep-forest); }
        .sidebar-link.active {
            background: var(--deep-forest);
            color: white;
            box-shadow: 0 8px 15px -4px rgba(4, 47, 46, 0.3);
        }

        /* Tombol Keluar Style */
        .sidebar-footer {
            padding: 20px 16px 30px;
        }

        .btn-logout-sidebar {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            background: transparent;
            color: var(--danger-red);
            border: 1px solid #fee2e2;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-logout-sidebar:hover {
            background: #fef2f2;
            border-color: var(--danger-red);
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 100px 40px 40px;
        }

        /* TABLE CONTAINER */
        .table-container {
            background: white;
            border-radius: 20px;
            padding: 25px;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        .table-simpatik {
            border-collapse: separate;
            border-spacing: 0 8px;
            width: 100%;
        }

        .table-simpatik thead th {
            color: var(--text-muted);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.65rem;
            letter-spacing: 1px;
            padding: 10px 20px;
            border: none;
        }

        .table-simpatik tbody tr td {
            padding: 18px 20px;
            background: white;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.85rem;
        }

        .table-simpatik tbody tr td:first-child { border-left: 1px solid #f1f5f9; border-radius: 12px 0 0 12px; }
        .table-simpatik tbody tr td:last-child { border-right: 1px solid #f1f5f9; border-radius: 0 12px 12px 0; }

        .status-pill {
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .waiting { background: #fffbeb; color: #b45309; }
        .approved { background: #f0fdf4; color: #15803d; }
        .rejected { background: #fef2f2; color: #b91c1c; }

        .btn-unduh {
            background: var(--deep-forest);
            color: white;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.75rem;
            padding: 8px 18px;
            border: none;
            transition: 0.3s;
        }
        .btn-unduh:hover { background: var(--emerald-accent); color: white; transform: translateY(-2px); }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; padding: 100px 20px; }
            .sidebar.active { transform: translateX(0); }
        }
    </style>
</head>
<body>

<nav class="navbar fixed-top">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn d-lg-none me-2 p-0" onclick="document.querySelector('.sidebar').classList.toggle('active')">
                <i class="fas fa-bars-staggered"></i>
            </button>
            <a class="navbar-brand" href="#">SIMPATIK<span class="text-success">.</span></a>
        </div>
        
        <div class="d-flex align-items-center d-none d-sm-flex">
            <div class="text-end me-3">
                <p class="mb-0 fw-bold small text-dark">{{ Auth::user()->name }}</p>
                <p class="mb-0 text-muted" style="font-size: 0.6rem;">Mahasiswa UINSU</p>
            </div>
        </div>
    </div>
</nav>

<div class="sidebar shadow-sm">
    <div class="sidebar-content">
        <a href="{{ route('mahasiswa.dashboard') }}" class="sidebar-link">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="{{ route('mahasiswa.status') }}" class="sidebar-link active">
            <i class="fas fa-clock-rotate-left"></i> Riwayat Pengajuan
        </a>
    </div>

    <div class="sidebar-footer">
        <form action="{{ route('mahasiswa.logout') }}" method="POST" id="logout-form">
            @csrf
            <button type="submit" class="btn-logout-sidebar">
                <i class="fas fa-sign-out-alt"></i> KELUAR
            </button>
        </form>
    </div>
</div>

<main class="main-content">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h4 class="fw-800 mb-1" style="color: var(--deep-forest); font-size: 1.4rem;">Riwayat Pengajuan</h4>
            <p class="text-muted small mb-0">Pantau seluruh aktivitas administrasi Kerja Praktik Anda.</p>
        </div>
        <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-dark btn-sm rounded-pill px-3 fw-bold shadow-sm" style="font-size: 0.75rem;">
            <i class="fas fa-plus me-1"></i> Pengajuan Baru
        </a>
    </div>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-simpatik align-middle">
                <thead>
                    <tr>
                        <th class="text-center" width="50">No</th>
                        <th>Tanggal</th>
                        <th>Instansi Tujuan</th>
                        <th>Status Verifikasi</th>
                        <th>Catatan Admin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuans as $p)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-bold">{{ $p->created_at->format('d M Y') }}</div>
                            <div class="text-muted" style="font-size: 0.65rem;">ID: #REQ-{{ $p->id }}</div>
                        </td>
                        <td>
                            <div class="fw-bold text-uppercase" style="color: var(--deep-forest);">{{ $p->instansi_tujuan }}</div>
                        </td>
                        <td>
                            @if($p->status == 'menunggu')
                                <span class="status-pill waiting"><i class="fas fa-clock"></i> Menunggu</span>
                            @elseif($p->status == 'disetujui')
                                <span class="status-pill approved"><i class="fas fa-check-circle"></i> Disetujui</span>
                            @else
                                <span class="status-pill rejected"><i class="fas fa-times-circle"></i> Ditolak</span>
                            @endif
                        </td>
                        <td>
                            <span class="text-muted small">{{ $p->catatan_admin ?? '-' }}</span>
                        </td>
                        <td class="text-center">
                            @if($p->status == 'disetujui' && $p->surat_balasan)
                                <a href="{{ asset('storage/'.$p->surat_balasan) }}" class="btn-unduh text-decoration-none" target="_blank">
                                    <i class="fas fa-download me-1"></i> Unduh
                                </a>
                            @elseif($p->status == 'ditolak')
                                <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-sm btn-outline-danger rounded-pill fw-bold" style="font-size: 0.65rem;">
                                    Perbaiki
                                </a>
                            @else
                                <span class="text-muted fw-bold" style="font-size: 0.7rem;">DIPROSES</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="fas fa-folder-open fa-3x text-muted opacity-25 mb-3"></i>
                            <p class="fw-bold text-muted">Belum ada riwayat pengajuan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>