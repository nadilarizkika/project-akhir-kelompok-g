<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --deep-forest: #042f2e;
            --emerald-accent: #10b981;
            --soft-green: #f0fdf4;
            --sidebar-width: 280px;
            --text-slate: #475569;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: var(--deep-forest);
            overflow-x: hidden;
        }

        /* NAVBAR MODERN */
        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 10px 30px;
            z-index: 1050;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--deep-forest) !important;
            font-size: 1.4rem;
        }

        /* SIDEBAR PREMIUM */
        .sidebar {
            width: var(--sidebar-width);
            background: white;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            padding-top: 90px;
            border-right: 1px solid rgba(0,0,0,0.05);
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 14px 22px;
            color: var(--text-slate);
            text-decoration: none;
            font-weight: 600;
            margin: 8px 18px;
            border-radius: 14px;
            transition: 0.3s;
        }

        .sidebar-link i {
            width: 25px;
            font-size: 1.1rem;
            margin-right: 10px;
        }

        .sidebar-link:hover {
            background: var(--soft-green);
            color: var(--deep-forest);
        }

        .sidebar-link.active {
            background: var(--deep-forest);
            color: white;
            box-shadow: 0 10px 20px -5px rgba(4, 47, 46, 0.3);
        }

        /* MAIN CONTENT AREA */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 110px 40px 40px;
            transition: 0.4s;
        }

        /* BENTO CARDS */
        .card-bento {
            background: white;
            border: 1px solid rgba(0,0,0,0.04);
            border-radius: 24px;
            padding: 25px;
            height: 100%;
            transition: all 0.3s ease;
        }

        .card-bento:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.04);
            border-color: var(--emerald-accent);
        }

        .icon-square {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .label-upper {
            font-size: 0.7rem;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            display: block;
            margin-bottom: 5px;
        }

        /* STATUS BADGE */
        .status-pill {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .pill-waiting { background: #fffbeb; color: #b45309; border: 1px solid #fef3c7; }
        .pill-approved { background: #f0fdf4; color: #15803d; border: 1px solid #dcfce7; }
        .pill-rejected { background: #fef2f2; color: #b91c1c; border: 1px solid #fee2e2; }

        /* DOWNLOAD ANNOUNCEMENT */
        .download-announcement {
            border-radius: 24px;
            padding: 30px;
            background: var(--deep-forest);
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .download-announcement::after {
            content: '\f15b';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: -20px;
            bottom: -20px;
            font-size: 120px;
            opacity: 0.05;
            transform: rotate(-15deg);
        }

        .btn-premium-download {
            background: white;
            color: var(--deep-forest);
            font-weight: 700;
            padding: 12px 25px;
            border-radius: 12px;
            border: none;
            transition: 0.3s;
        }

        .btn-premium-download:hover {
            background: var(--emerald-accent);
            color: white;
            transform: scale(1.05);
        }

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
            <button class="btn d-lg-none me-2 text-dark" onclick="document.querySelector('.sidebar').classList.toggle('active')">
                <i class="fas fa-bars-staggered"></i>
            </button>
            <a class="navbar-brand" href="#">SIMPATIK<span class="text-success">.</span></a>
        </div>
        <div class="d-flex align-items-center">
            <div class="text-end me-3 d-none d-md-block">
                <div class="fw-bold" style="font-size: 0.85rem;">{{ Auth::user()->name }}</div>
                <div class="text-muted" style="font-size: 0.7rem;">Mahasiswa UINSU</div>
            </div>
            <form action="{{ route('mahasiswa.logout') }}" method="POST">
                @csrf
                <button class="btn btn-dark btn-sm rounded-pill px-3 fw-bold">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="sidebar shadow-sm">
    <a href="{{ route('mahasiswa.dashboard') }}" class="sidebar-link active">
        <i class="fas fa-home"></i> Dashboard
    </a>
    <a href="{{ route('mahasiswa.status') }}" class="sidebar-link">
        <i class="fas fa-clock-rotate-left"></i> Riwayat Pengajuan
    </a>
</div>

<main class="main-content">
    <header class="mb-4">
        <h3 class="fw-800 mb-1">Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h3>
        <p class="text-muted small">Selamat datang kembali di sistem administrasi Kerja Praktik.</p>
    </header>

    @if($pengajuan)
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card-bento">
                <div class="icon-square bg-success-subtle text-success">
                    <i class="fas fa-shield-check"></i>
                </div>
                <span class="label-upper">Status Pengajuan</span>
                <div class="mt-2">
                    @if($pengajuan->status == 'menunggu')
                        <span class="status-pill pill-waiting"><i class="fas fa-spinner fa-spin"></i> Menunggu</span>
                    @elseif($pengajuan->status == 'disetujui')
                        <span class="status-pill pill-approved"><i class="fas fa-check-circle"></i> Disetujui</span>
                    @else
                        <span class="status-pill pill-rejected"><i class="fas fa-times-circle"></i> Ditolak</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-bento">
                <div class="icon-square bg-primary-subtle text-primary">
                    <i class="fas fa-map-location-dot"></i>
                </div>
                <span class="label-upper">Tujuan Instansi</span>
                <h6 class="fw-800 mt-2 mb-0">{{ Str::limit($pengajuan->instansi_tujuan, 30) }}</h6>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-bento">
                <div class="icon-square bg-warning-subtle text-warning">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <span class="label-upper">Periode KP</span>
                <h6 class="fw-bold mt-2 mb-0" style="font-size: 0.85rem;">
                    {{ date('d M', strtotime($pengajuan->tanggal_mulai)) }} - {{ date('d M Y', strtotime($pengajuan->tanggal_selesai)) }}
                </h6>
            </div>
        </div>

        @if($pengajuan->status === 'disetujui' && $pengajuan->surat_balasan)
        <div class="col-12 mt-2">
            <div class="download-announcement shadow-lg">
                <div class="d-flex align-items-center">
                    <div class="me-4 d-none d-md-block">
                        <i class="fas fa-file-circle-check fa-3x"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Surat Balasan Telah Tersedia!</h5>
                        <p class="mb-0 small opacity-75">Silakan unduh dokumen resmi untuk melanjutkan proses Kerja Praktik.</p>
                    </div>
                </div>
                <a href="{{ asset('storage/'.$pengajuan->surat_balasan) }}" class="btn btn-premium-download" target="_blank">
                    Unduh PDF <i class="fas fa-arrow-down ms-1"></i>
                </a>
            </div>
        </div>
        @endif
    </div>
    @else
    <div class="card-bento text-center py-5 border-dashed" style="border: 2px dashed #e2e8f0;">
        <img src="https://illustrations.popsy.co/white/data-analysis.svg" alt="ready" style="width: 180px;" class="mb-4">
        <h5 class="fw-bold">Belum Ada Pengajuan Aktif</h5>
        <p class="text-muted small mb-4 mx-auto" style="max-width: 350px;">Segera daftarkan rencana Kerja Praktik Anda untuk diproses oleh pihak universitas.</p>
        <a href="{{ route('pengajuan.create') }}" class="btn btn-dark rounded-pill px-5 py-3 fw-bold">
            Buat Pengajuan Sekarang <i class="fas fa-paper-plane ms-1"></i>
        </a>
    </div>
    @endif
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>