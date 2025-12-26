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
            --primary-emerald: #10b981;
            --dark-emerald: #064e3b;
            --accent-pink: #f472b6;
            --bg-soft: #f8fafc;
            --sidebar-width: 280px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-soft);
            color: #1e293b;
            overflow-x: hidden;
        }

        /* NAVBAR MODERN */
        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 12px 30px;
            z-index: 1050;
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 1px;
            color: var(--dark-emerald) !important;
            font-size: 1.5rem;
        }

        /* SIDEBAR MODERN */
        .sidebar {
            width: var(--sidebar-width);
            background: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 100px;
            border-right: 1px solid rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 14px 25px;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            margin: 8px 20px;
            border-radius: 16px;
            transition: 0.3s all;
        }

        .sidebar-link i {
            width: 28px;
            font-size: 1.2rem;
            margin-right: 12px;
            transition: 0.3s;
        }

        .sidebar-link:hover {
            background: #f1f5f9;
            color: var(--dark-emerald);
        }

        .sidebar-link.active {
            background: var(--dark-emerald);
            color: white;
            box-shadow: 0 10px 20px -5px rgba(6, 78, 59, 0.3);
        }

        /* MAIN CONTENT AREA */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 120px 45px 45px;
            transition: 0.4s;
        }

        /* CARD BENTO STYLE */
        .card-bento {
            background: white;
            border: 1px solid rgba(0,0,0,0.03);
            border-radius: 28px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.02);
            height: 100%;
            transition: all 0.3s ease;
        }

        .card-bento:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.06);
            border-color: var(--primary-emerald);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
            font-size: 1.3rem;
        }

        .label-text {
            font-size: 0.75rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: block;
            margin-bottom: 8px;
        }

        .status-badge {
            padding: 8px 18px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-block;
        }

        .badge-waiting { background: #fffbeb; color: #d97706; border: 1px solid #fef3c7; }
        .badge-approved { background: #ecfdf5; color: #059669; border: 1px solid #d1fae5; }
        .badge-rejected { background: #fef2f2; color: #dc2626; border: 1px solid #fee2e2; }

        /* DOWNLOAD BOX */
        .download-box {
            border-radius: 28px;
            padding: 35px;
            border: 1px solid #d1fae5;
            background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.08);
        }

        .btn-download {
            background: var(--dark-emerald);
            color: white;
            padding: 12px 28px;
            font-weight: 700;
            transition: 0.3s;
            border: none;
        }

        .btn-download:hover {
            background: var(--primary-emerald);
            transform: scale(1.05);
            color: white;
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; padding: 110px 25px 25px; }
            .sidebar.active { transform: translateX(0); }
        }
    </style>
</head>
<body>

<nav class="navbar fixed-top">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn d-lg-none me-2" onclick="document.querySelector('.sidebar').classList.toggle('active')">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">SIMPATIK<span>.</span></a>
        </div>
        <div class="d-flex align-items-center">
            <div class="text-end me-3 d-none d-md-block">
                <div class="fw-bold text-dark" style="font-size: 0.9rem;">{{ Auth::user()->name }}</div>
                <div class="text-muted" style="font-size: 0.75rem;">Mahasiswa Aktif</div>
            </div>
            <form action="{{ route('mahasiswa.logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-bold">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="sidebar">
    <a href="{{ route('mahasiswa.dashboard') }}" class="sidebar-link active">
        <i class="fas fa-columns"></i> Dashboard
    </a>
    <a href="{{ route('mahasiswa.status') }}" class="sidebar-link">
        <i class="fas fa-file-signature"></i> Status Pengajuan
    </a>
</div>

<main class="main-content">
    <header class="mb-5">
        <h2 class="fw-800 mb-2">Selamat Datang, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h2>
        <p class="text-secondary">Berikut adalah ringkasan aktivitas pengajuan Kerja Praktik Anda.</p>
    </header>

    @if($pengajuan)
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card-bento">
                <div class="icon-box bg-success-subtle text-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <span class="label-text">Status Berkas</span>
                <div class="mt-2">
                    @if($pengajuan->status == 'menunggu')
                        <span class="status-badge badge-waiting">Menunggu Verifikasi</span>
                    @elseif($pengajuan->status == 'disetujui')
                        <span class="status-badge badge-approved">Disetujui Admin</span>
                    @else
                        <span class="status-badge badge-rejected">Ditolak</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-bento">
                <div class="icon-box bg-primary-subtle text-primary">
                    <i class="fas fa-building"></i>
                </div>
                <span class="label-text">Instansi Tujuan</span>
                <h5 class="fw-bold mt-2 text-dark">{{ $pengajuan->instansi_tujuan }}</h5>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-bento">
                <div class="icon-box bg-danger-subtle text-danger">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <span class="label-text">Waktu Pelaksanaan</span>
                <h6 class="fw-bold mt-2 text-dark">
                    {{ date('d M Y', strtotime($pengajuan->tanggal_mulai)) }} — {{ date('d M Y', strtotime($pengajuan->tanggal_selesai)) }}
                </h6>
            </div>
        </div>

        @if($pengajuan->status === 'disetujui' && $pengajuan->surat_balasan)
        <div class="col-12 mt-4">
            <div class="download-box">
                <div class="d-flex align-items-center flex-wrap">
                    <div class="icon-box bg-success text-white mb-0 me-4">
                        <i class="fas fa-file-download"></i>
                    </div>
                    <div class="flex-grow-1 py-2">
                        <h5 class="fw-bold mb-1 text-dark">Surat Balasan Telah Terbit!</h5>
                        <p class="text-muted small mb-0">Dokumen resmi sudah tersedia. Silakan unduh untuk melengkapi administrasi Kerja Praktik Anda.</p>
                    </div>
                    <div class="mt-3 mt-lg-0">
                        <a href="{{ asset('storage/'.$pengajuan->surat_balasan) }}" 
                           class="btn btn-download rounded-pill px-4" target="_blank">
                            <i class="fas fa-download me-2"></i> Unduh Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @else
    <div class="card-bento text-center py-5">
        <img src="https://illustrations.popsy.co/emerald/clumsy-man-falling-with-his-laptop.svg" alt="no-data" style="width: 220px;" class="mb-4 opacity-75">
        <h4 class="fw-bold">Siap Memulai Kerja Praktik?</h4>
        <p class="text-muted mb-4 mx-auto" style="max-width: 400px;">Anda belum mengirimkan pengajuan. Klik tombol di bawah untuk mengisi formulir pendaftaran.</p>
        <a href="{{ route('pengajuan.create') }}" class="btn btn-success rounded-pill px-5 py-3 fw-bold shadow-sm">
            Buat Pengajuan <i class="fas fa-plus ms-2"></i>
        </a>
    </div>
    @endif
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>