<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-emerald: #10b981;
            --dark-emerald: #064e3b;
            --accent-pink: #f472b6;
            --bg-soft: #f8fafc;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-soft);
            color: #1e293b;
        }

        /* NAVBAR & SIDEBAR (Tetap Ada) */
        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 15px 30px;
            z-index: 1000;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: white;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            padding-top: 80px;
            border-right: 1px solid rgba(0,0,0,0.05);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 14px 25px;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            margin: 8px 15px;
            border-radius: 12px;
            transition: 0.3s;
        }

        .sidebar-link.active {
            background: var(--dark-emerald);
            color: white;
            box-shadow: 0 10px 20px -5px rgba(6, 78, 59, 0.2);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 100px 40px 40px;
            display: flex;
            justify-content: center; /* Membuat konten di tengah */
        }

        /* KARTU STATUS COMPACT & MEWAH */
        .status-card-premium {
            width: 100%;
            max-width: 700px; /* Ukuran Lebih Kecil & Kompak */
            background: white;
            border-radius: 35px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
            display: flex;
            border: 1px solid rgba(0,0,0,0.02);
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Sisi Kiri: Mini Brand */
        .card-side-brand {
            background: linear-gradient(165deg, var(--dark-emerald), var(--primary-emerald));
            width: 35%;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .mini-logo-text {
            font-weight: 800;
            font-size: 0.85rem;
            letter-spacing: 0.6rem;
            color: var(--accent-pink);
            text-transform: uppercase;
            margin-right: -0.6rem;
        }

        /* Sisi Kanan: Info */
        .card-info-content {
            width: 65%;
            padding: 40px;
        }

        .data-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .data-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
        }

        .data-value {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--dark-emerald);
        }

        .badge-status {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .note-box {
            background: #fdf2f8;
            border-radius: 15px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid var(--accent-pink);
            font-size: 0.8rem;
            color: #831843;
        }

        .btn-download {
            background: var(--dark-emerald);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 15px;
            width: 100%;
            font-weight: 700;
            margin-top: 25px;
            transition: 0.3s;
        }

        .btn-download:hover {
            background: var(--accent-pink);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(244, 114, 182, 0.3);
        }

        @media (max-width: 992px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; padding: 100px 20px; }
            .status-card-premium { flex-direction: column; }
            .card-side-brand, .card-info-content { width: 100%; }
        }
    </style>
</head>
<body>

<nav class="navbar fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SIMPATIK</a>
        <form action="{{ route('mahasiswa.logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-danger btn-sm rounded-pill px-3">Logout</button>
        </form>
    </div>
</nav>

<div class="sidebar">
    <a href="{{ route('mahasiswa.dashboard') }}" class="sidebar-link">
        <i class="fas fa-th-large"></i> Dashboard
    </a>
    <a href="{{ route('mahasiswa.status') }}" class="sidebar-link active">
        <i class="fas fa-file-alt"></i> Status Pengajuan
    </a>
</div>

<main class="main-content">
    <div class="status-card-premium">
        @if($pengajuan)
            <div class="card-side-brand">
                <div class="mb-3" style="background: rgba(255,255,255,0.1); width: 60px; height: 60px; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-clipboard-check fa-2x"></i>
                </div>
                <span class="mini-logo-text">SIMPATIK</span>
                <p class="small opacity-50 mt-2 text-uppercase fw-bold" style="letter-spacing: 2px; font-size: 0.6rem;">Status Page</p>
            </div>

            <div class="card-info-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-800 mb-0">Detail Status</h5>
                    @if($pengajuan->status == 'menunggu')
                        <span class="badge-status bg-warning text-dark">Waiting</span>
                    @elseif($pengajuan->status == 'disetujui')
                        <span class="badge-status bg-success text-white">Approved</span>
                    @else
                        <span class="badge-status bg-danger text-white">Rejected</span>
                    @endif
                </div>

                <div class="data-row">
                    <span class="data-label">Nama Lengkap</span>
                    <span class="data-value">{{ $pengajuan->nama_mahasiswa }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">NIM</span>
                    <span class="data-value">{{ $pengajuan->nim }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Instansi</span>
                    <span class="data-value">{{ $pengajuan->instansi_tujuan }}</span>
                </div>

                @if($pengajuan->catatan_admin)
                    <div class="note-box">
                        <i class="fas fa-info-circle me-1"></i> {{ $pengajuan->catatan_admin }}
                    </div>
                @endif

                @if($pengajuan->status == 'disetujui' && $pengajuan->surat_balasan)
                    <a href="{{ asset('storage/'.$pengajuan->surat_balasan) }}" class="btn btn-download shadow-sm text-decoration-none d-block text-center">
                        <i class="fas fa-download me-2"></i> UNDUH SURAT BALASAN
                    </a>
                @endif
            </div>
        @else
            <div class="p-5 text-center w-100">
                <h6 class="text-muted fw-bold">Belum ada pengajuan.</h6>
            </div>
        @endif
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>