<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPATIK — Sistem Informasi Kerja Praktik</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Bricolage+Grotesque:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --brand-dark: #052214;
            --brand-primary: #0f5132;
            --brand-accent: #198754;
            --soft-bg: #fdfdfd;
            --text-main: #1a1a1a;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--soft-bg);
            color: var(--text-main);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* ================= NAVIGATION ================= */
        .navbar {
            padding: 25px 0;
            transition: all 0.4s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            padding: 15px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .brand-text {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-weight: 800;
            font-size: 24px;
            letter-spacing: -1px;
            color: var(--brand-dark);
            text-decoration: none;
        }

        .btn-auth-premium {
            background: var(--brand-dark);
            color: white !important;
            border-radius: 50px;
            padding: 10px 24px !important;
            font-weight: 700;
            font-size: 13px;
            transition: 0.3s;
        }

        /* ================= HERO (CLEAN) ================= */
        .hero {
            padding: 140px 0 80px;
            background: radial-gradient(circle at top right, rgba(25, 135, 84, 0.05), transparent);
        }

        .hero-h1 {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            color: var(--brand-dark);
            margin-bottom: 25px;
        }

        .btn-cta-main {
            background: var(--brand-primary);
            color: white;
            padding: 18px 40px;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: 0.3s;
        }

        .btn-cta-main:hover {
            background: var(--brand-dark);
            color: white;
            transform: translateY(-2px);
        }

        /* ================= KETERANGAN PENTING ================= */
        .important-section {
            background: #fff;
            padding: 80px 0;
        }

        .info-card {
            border: 1px solid #f0f0f0;
            border-radius: 20px;
            padding: 35px;
            height: 100%;
            transition: 0.3s;
        }

        .info-card:hover {
            border-color: var(--brand-accent);
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        }

        .step-num {
            width: 40px;
            height: 40px;
            background: var(--brand-primary);
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .warning-box {
            background: #fff8f8;
            border-left: 4px solid #dc3545;
            padding: 25px;
            border-radius: 12px;
            margin-top: 40px;
        }

        /* ================= FOOTER ================= */
        footer {
            padding: 50px 0;
            border-top: 1px solid #eee;
            background: #fff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a class="brand-text" href="#">SIMPATIK.</a>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link fw-bold px-3" href="#informasi">Panduan</a></li>
                <li class="nav-item"><a class="nav-link fw-bold px-3" href="#kontak">Kontak</a></li>
                <li class="nav-item ms-lg-3">
                    @if(Auth::guard('admin')->check())
                        <a class="btn-auth-premium nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @else
                        <a class="btn-auth-premium nav-link" href="{{ route('login.admin') }}">Login Admin</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero text-center">
    <div class="container">
        <h1 class="hero-h1" data-aos="fade-up">Platform Digital <br> Kerja Praktik UINSU.</h1>
        <p class="text-muted mx-auto mb-5" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="100">
            Kelola pengajuan Kerja Praktik Anda secara mandiri, transparan, dan efisien dalam satu pintu layanan digital.
        </p>
        <div data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('pengajuan.create') }}" class="btn-cta-main">
                Mulai Pengajuan <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<section id="informasi" class="important-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-800">Keterangan Penting</h2>
            <p class="text-muted">Harap perhatikan langkah-langkah berikut sebelum mengisi formulir</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="info-card">
                    <div class="step-num">01</div>
                    <h5 class="fw-bold">Persiapan Berkas</h5>
                    <p class="small text-muted mb-0">Pastikan Proposal Kerja Praktik telah disetujui oleh Dosen Pembimbing Akademik dan telah diubah ke format PDF (Maks. 2MB).</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="info-card">
                    <div class="step-num">02</div>
                    <h5 class="fw-bold">Validasi Data</h5>
                    <p class="small text-muted mb-0">Periksa kembali NIM dan Nama Lengkap sesuai di SIA. Kesalahan input data dapat menghambat proses verifikasi oleh Admin.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="info-card">
                    <div class="step-num">03</div>
                    <h5 class="fw-bold">Instansi Tujuan</h5>
                    <p class="small text-muted mb-0">Pastikan Anda telah memiliki informasi kontak dan alamat lengkap instansi yang dituju untuk keperluan penerbitan surat.</p>
                </div>
            </div>
        </div>

        <div class="warning-box" data-aos="zoom-in">
            <h6 class="text-danger fw-bold"><i class="fa-solid fa-circle-exclamation me-2"></i> Perhatian Khusus</h6>
            <p class="small mb-0 text-dark">Mahasiswa hanya diperbolehkan melakukan satu kali pengajuan aktif. Harap tunggu konfirmasi status dari Admin melalui menu Dashboard atau pantau email Anda secara berkala.</p>
        </div>
    </div>
</section>

<section id="kontak" class="py-5 bg-light">
    <div class="container py-4 text-center">
        <h4 class="fw-800 mb-3">Butuh Bantuan Teknis?</h4>
        <p class="small text-muted mb-4">Hubungi kami jika mengalami kendala sistem atau kesulitan dalam unggah berkas.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="mailto:admin.simpatik@uinsu.ac.id" class="text-dark fw-bold text-decoration-none small"><i class="fa-solid fa-envelope me-2"></i> admin.simpatik@uinsu.ac.id</a>
            <span class="text-muted">|</span>
            <span class="small fw-bold"><i class="fa-solid fa-location-dot me-2"></i> Kampus IV UINSU</span>
        </div>
    </div>
</section>

<footer>
    <div class="container text-center">
        <p class="small text-muted mb-0">© 2025 Universitas Islam Negeri Sumatera Utara. Built for Academic Integrity.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script> 

@if(session('success'))
<div class="container mt-4" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; max-width: 500px;">
    <div class="alert alert-success border-0 shadow-lg rounded-4 p-3 d-flex align-items-center" role="alert">
        <i class="fa-solid fa-circle-check fs-4 me-3"></i>
        <div>
            <span class="fw-bold d-block">Pengajuan Terkirim!</span>
            <span class="small">{{ session('success') }}</span>
        </div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

</html><a href="{{ route('pengajuan.create') }}" class="btn-cta-main">
    Mulai Pengajuan <i class="fa-solid fa-arrow-right"></i>
</a>
</body>
