<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPATIK — Digital Portal UINSU</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --primary: #0f172a;
            --emerald: #10b981;
            --emerald-soft: #ecfdf5;
            --slate: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: var(--primary);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* ================= NAVIGATION ================= */
        .navbar {
            padding: 25px 0;
            transition: 0.4s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            padding: 15px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -1px;
            color: var(--primary) !important;
        }

        .nav-link {
            font-weight: 600;
            color: var(--primary) !important;
            margin: 0 10px;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: var(--emerald) !important;
        }

        .btn-nav-premium {
            background: var(--primary);
            color: white !important;
            border-radius: 14px;
            padding: 10px 24px !important;
            font-weight: 700;
            transition: 0.3s;
        }

        .btn-nav-premium:hover {
            background: var(--emerald);
            transform: translateY(-2px);
        }

        /* ================= HERO SECTION (CLEAN) ================= */
        .hero-section {
            padding: 180px 0 120px;
            background: radial-gradient(circle at 90% 10%, var(--emerald-soft), transparent 40%);
            text-align: center;
        }

        .hero-title {
            font-weight: 800;
            font-size: clamp(2.5rem, 7vw, 4.8rem);
            line-height: 1.05;
            letter-spacing: -3px;
            margin-bottom: 30px;
            color: var(--primary);
        }

        .hero-title span { 
            color: var(--emerald); 
        }

        .hero-desc {
            font-size: 1.25rem;
            color: var(--slate);
            max-width: 700px;
            margin: 0 auto 40px;
            line-height: 1.6;
        }

        .btn-hero {
            background: var(--primary);
            color: white;
            padding: 18px 45px;
            border-radius: 18px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: 0.4s;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.1);
        }

        .btn-hero:hover {
            background: var(--emerald);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(16, 185, 129, 0.2);
        }

        /* ================= BENTO GRID SECTION ================= */
        .bento-grid {
            padding: 100px 0;
            background-color: #fcfcfc;
        }

        .bento-card {
            background: white;
            border-radius: 35px;
            padding: 45px;
            height: 100%;
            border: 1px solid #f1f5f9;
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .bento-card:hover {
            transform: translateY(-12px);
            border-color: var(--emerald);
            box-shadow: 0 40px 80px -15px rgba(0,0,0,0.05);
        }

        .icon-wrap {
            width: 65px; height: 65px;
            background: var(--emerald-soft);
            color: var(--emerald);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin-bottom: 30px;
        }

        /* ================= HELP SECTION (FOOTER AREA) ================= */
        #bantuan {
            padding: 80px 0;
            border-top: 1px solid #f1f5f9;
        }

        /* ================= MODAL LOGIN ================= */
        .modal-content {
            border-radius: 40px;
            border: none;
            padding: 25px;
        }

        .login-btn-option {
            padding: 22px;
            border-radius: 20px;
            font-weight: 800;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: 0.3s;
            margin-bottom: 15px;
        }

        .opt-mhs { background: var(--primary); color: white; }
        .opt-adm { background: #f1f5f9; color: var(--primary); }

        .opt-mhs:hover { background: var(--emerald); color: white; transform: scale(1.02); }
        .opt-adm:hover { background: #e2e8f0; transform: scale(1.02); }

        footer {
            padding: 50px 0;
            color: var(--slate);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">SIMPATIK<span>.</span></a>
        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="fas fa-bars-staggered"></i>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center mt-3 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="#panduan">Panduan</a></li>
                <li class="nav-item"><a class="nav-link" href="#bantuan">Bantuan</a></li>
                <li class="nav-item ms-lg-4">
                    @auth
                        <a class="btn-nav-premium" href="{{ Auth::guard('admin')->check() ? route('admin.dashboard') : route('mahasiswa.dashboard') }}">Dashboard</a>
                    @else
                        <a class="btn-nav-premium" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Portal Masuk</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero-section">
    <div class="container">
        <div data-aos="fade-up">
            <h1 class="hero-title">SIMPATIK — <br>Sistem Kerja Praktik <span>Digital</span>.</h1>
            <p class="hero-desc">
                Kelola administrasi Kerja Praktik Anda dengan ekosistem digital terpadu yang dibangun untuk kenyamanan dan transparansi mahasiswa.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('pengajuan.create') }}" class="btn-hero">
                    Buat Pengajuan <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="panduan" class="bento-grid">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-800 h1">Layanan Terpadu</h2>
            <p class="text-muted fs-5">Alur digital yang modern dan efisien</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="bento-card text-center">
                    <div class="icon-wrap mx-auto"><i class="fas fa-file-invoice"></i></div>
                    <h5 class="fw-bold mb-3">Berkas Paperless</h5>
                    <p class="text-muted small">Unggah proposal dan berkas syarat administrasi lainnya langsung melalui portal tanpa perlu ke kampus.</p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="bento-card text-center">
                    <div class="icon-wrap mx-auto"><i class="fas fa-bolt"></i></div>
                    <h5 class="fw-bold mb-3">Respons Cepat</h5>
                    <p class="text-muted small">Status verifikasi dokumen oleh administrator dapat dipantau secara langsung melalui notifikasi dashboard.</p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="bento-card text-center">
                    <div class="icon-wrap mx-auto"><i class="fas fa-certificate"></i></div>
                    <h5 class="fw-bold mb-3">Output Digital</h5>
                    <p class="text-muted small">Surat pengantar dan balasan resmi diterbitkan dalam format PDF yang sah untuk instansi tujuan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="bantuan" class="text-center">
    <div class="container" data-aos="zoom-in">
        <h3 class="fw-800 mb-4">Butuh Bantuan Teknis?</h3>
        <p class="text-muted mb-5 mx-auto" style="max-width: 600px;">
            Jika Anda mengalami kendala saat mengunggah berkas atau akses portal, silakan hubungi tim helpdesk kami.
        </p>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <span class="fw-bold"><i class="fas fa-envelope text-success me-2"></i> helpdesk.simpatik@uinsu.ac.id</span>
            <span class="fw-bold"><i class="fas fa-building text-success me-2"></i> Kampus IV UINSU</span>
        </div>
    </div>
</section>

<footer class="text-center">
    <div class="container">
        <p class="mb-0">&copy; 2025 SIMPATIK UINSU &bull; Made with Academic Integrity.</p>
    </div>
</footer>

<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
        <div class="modal-content shadow-lg">
            <div class="text-center mb-4">
                <h4 class="fw-800">Akses Portal</h4>
                <p class="text-muted small">Pilih pintu masuk sesuai peran Anda</p>
            </div>
            <a href="{{ route('mahasiswa.login') }}" class="login-btn-option opt-mhs">
                <span>Login Mahasiswa</span>
                <i class="fas fa-user-graduate"></i>
            </a>
            <a href="{{ route('login.admin') }}" class="login-btn-option opt-adm">
                <span>Administrator</span>
                <i class="fas fa-user-shield"></i>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });
    
    // Smooth Scroll & Navbar Transparency
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('#mainNav');
        if (window.scrollY > 40) nav.classList.add('scrolled');
        else nav.classList.remove('scrolled');
    });
</script>
</body>
</html>