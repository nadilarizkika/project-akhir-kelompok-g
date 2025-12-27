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
            --sidebar-width: 260px;
            --text-slate: #475569;
            --danger-red: #ef4444;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: var(--deep-forest);
            font-size: 0.9rem;
        }

        /* NAVBAR RAMPING */
        .navbar {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.06);
            padding: 10px 30px;
            z-index: 1050;
        }

        /* Teks SIMPATIK Bold di Navbar */
        .navbar-brand {
            font-weight: 800 !important;
            letter-spacing: -0.5px;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            background: white;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(0,0,0,0.05);
            padding-top: 20px;
            z-index: 1000;
        }

        /* Teks SIMPATIK Bold di Sidebar Header */
        .sidebar-header {
            padding: 10px 25px 30px;
            font-weight: 800;
            font-size: 1.4rem;
            color: var(--deep-forest);
            letter-spacing: -0.5px;
        }

        .sidebar-content {
            flex-grow: 1;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 18px;
            color: var(--text-slate);
            text-decoration: none;
            font-weight: 600;
            margin: 5px 15px;
            border-radius: 12px;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .sidebar-link i { width: 22px; font-size: 1rem; margin-right: 8px; }
        .sidebar-link:hover { background: var(--soft-green); color: var(--deep-forest); }
        .sidebar-link.active { background: var(--deep-forest); color: white; }

        /* SIDEBAR FOOTER (LOGOUT) */
        .sidebar-footer {
            padding: 20px 15px 30px;
        }

        .btn-logout-sidebar {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
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
            padding: 110px 40px 40px;
        }

        .card-bento {
            background: white;
            border: 1px solid rgba(0,0,0,0.04);
            border-radius: 20px;
            padding: 20px;
            transition: 0.3s;
        }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); padding-top: 80px; }
            .main-content { margin-left: 0; padding: 100px 20px; }
            .sidebar.active { transform: translateX(0); }
        }
    </style>
</head>
<body>

<nav class="navbar fixed-top">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn d-lg-none me-2 p-0 border-0" onclick="document.querySelector('.sidebar').classList.toggle('active')">
                <i class="fas fa-bars-staggered"></i>
            </button>
            <a class="navbar-brand text-dark" href="#">
                <strong>SIMPATIK</strong><span class="text-success">.</span>
            </a>
        </div>
        
        <div class="ms-auto d-flex align-items-center">
            <div class="text-end me-3 d-none d-sm-block">
                <p class="mb-0 fw-bold text-dark" style="font-size: 0.9rem; line-height: 1.2;">
                    {{ Auth::user()->name }}
                </p>
                <p class="mb-0 text-muted" style="font-size: 0.7rem; font-weight: 500;">
                    Mahasiswa UINSU
                </p>
            </div>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=042f2e&color=fff" 
                 class="rounded-pill border" width="35" height="35">
        </div>
    </div>
</nav>

<div class="sidebar shadow-sm">
    <div class="sidebar-header d-none d-lg-block">
        <strong>SIMPATIK</strong><span class="text-success">.</span>
    </div>

    <div class="sidebar-content">
        <a href="{{ route('mahasiswa.dashboard') }}" class="sidebar-link active">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="{{ route('mahasiswa.status') }}" class="sidebar-link">
            <i class="fas fa-paper-plane"></i> Riwayat Pengajuan
        </a>
    </div>

    <div class="sidebar-footer">
        <form action="{{ route('mahasiswa.logout') }}" method="POST" id="logout-form">
            @csrf
            <button type="submit" class="btn-logout-sidebar border-0 bg-transparent w-100">
                <div class="btn-logout-sidebar">
                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> KELUAR
                </div>
            </button>
        </form>
    </div>
</div>

<main class="main-content">
    <header class="mb-4">
        <h4 class="fw-800 mb-1" style="font-size: 1.5rem;">Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h4>
        <p class="text-muted small">Selamat datang kembali di sistem administrasi Kerja Praktik.</p>
    </header>

    @if($pengajuan && $pengajuan->status !== 'ditolak')
        <div class="row g-3">
            </div>
    @else
        <div class="card-bento text-center py-5 border-dashed" style="border: 2px dashed #cbd5e1;">
            @if($pengajuan && $pengajuan->status === 'ditolak')
                <div class="alert alert-danger d-inline-flex align-items-center rounded-pill px-3 py-1 mb-3" style="font-size: 0.65rem; font-weight: 700;">
                    <i class="fas fa-exclamation-circle me-2"></i> Pengajuan ditolak. Silakan ajukan ulang.
                </div>
            @endif
            <div class="mb-3">
                <img src="https://illustrations.popsy.co/white/data-analysis.svg" style="width: 130px; opacity: 0.8;">
            </div>
            <h5 class="fw-800" style="font-size: 1.1rem;">Mulai Pengajuan</h5>
            <p class="text-muted mb-3 mx-auto" style="max-width: 280px; font-size: 0.75rem;">Daftarkan rencana Kerja Praktik Anda untuk diproses oleh pihak universitas.</p>
            <a href="{{ route('pengajuan.create') }}" class="btn btn-dark rounded-pill px-4 py-2 fw-bold" style="font-size: 0.8rem;">
                Buat Pengajuan Baru <i class="fas fa-paper-plane ms-2"></i>
            </a>
        </div>
    @endif
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>