<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPATIK — Portal Digital UIN Sumatera Utara</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --primary-forest: #062c21; 
            --emerald-soft: #059669;
            --bg-light: #fcfdfc;
            --text-slate: #334155;
            --transition-smooth: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: var(--text-slate);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Navbar */
        .navbar { padding: 15px 0; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border-bottom: 1px solid #eee; z-index: 1050; }
        .navbar-brand { font-weight: 800; color: var(--primary-forest) !important; font-size: 1.4rem; }
        .navbar-brand span { color: var(--emerald-soft); }

        .btn-portal { 
            background: var(--primary-forest); 
            color: white !important; 
            border-radius: 10px; 
            padding: 8px 24px; 
            font-weight: 700; 
            font-size: 0.85rem; 
            border: none; 
            transition: var(--transition-smooth);
        }
        .btn-portal:hover { background: #000; transform: translateY(-2px); }

        /* Hero Section */
        .hero-section {
            padding: 140px 0 80px; 
            text-align: center;
            background: radial-gradient(circle at 50% 0%, #f0fdf4 0%, transparent 60%);
        }

        .hero-badge {
            background: #eef5f3;
            color: var(--primary-forest);
            padding: 6px 16px;
            border-radius: 50px;
            font-weight: 800;
            font-size: 0.7rem;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
            display: inline-block;
            border: 1px solid rgba(6, 44, 33, 0.1);
        }

        .hero-title {
            font-weight: 800;
            font-size: clamp(2.5rem, 6vw, 4rem);
            line-height: 1.1;
            color: var(--primary-forest);
            margin-bottom: 20px;
        }

        .hero-title span { color: var(--emerald-soft); font-style: italic; }

        .hero-desc {
            font-size: 1.15rem;
            max-width: 700px;
            margin: 0 auto 35px;
            line-height: 1.7;
            opacity: 0.8;
        }

        .btn-hero {
            background: var(--primary-forest);
            color: white !important;
            padding: 16px 40px;
            border-radius: 14px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: var(--transition-smooth);
            box-shadow: 0 10px 30px rgba(6, 44, 33, 0.15);
        }

        .btn-hero:hover {
            background: #000;
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        /* Statistik */
        .stat-box h2 { font-weight: 800; color: var(--primary-forest); font-size: 2.5rem; }
        .stat-box p { font-weight: 600; font-size: 0.9rem; color: #64748b; }

        /* Bento Cards */
        .bento-card {
            background: white;
            border-radius: 28px;
            padding: 40px;
            height: 100%;
            border: 1px solid #f1f5f9;
            transition: var(--transition-smooth);
        }

        .bento-card:hover { 
            border-color: var(--emerald-soft); 
            transform: translateY(-10px); 
            box-shadow: 0 30px 60px rgba(0,0,0,0.05);
        }

        .icon-wrap {
            width: 55px; height: 55px;
            background: #f0fdf4;
            color: var(--primary-forest);
            border-radius: 15px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 25px;
        }

        /* Alur Prosedur */
        .step-number {
            width: 70px; height: 70px;
            background: white;
            color: var(--emerald-soft);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.8rem;
            font-weight: 800;
            margin: 0 auto 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        /* Modal */
        .modal-content { border-radius: 30px; border: none; }
        .btn-login-opt {
            border-radius: 18px;
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition-smooth);
            text-decoration: none;
            font-weight: 700;
        }
        .btn-login-opt:hover { transform: translateX(10px); }

        footer { padding: 40px 0; border-top: 1px solid #f1f5f9; background: #fff; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">SIMPATIK<span>.</span></a>
        <div class="ms-auto">
            <button class="btn-portal" data-bs-toggle="modal" data-bs-target="#loginModal">MASUK PORTAL</button>
        </div>
    </div>
</nav>

<section class="hero-section">
    <div class="container" data-aos="fade-up">
        <div class="hero-badge">OFFICIAL DIGITAL PORTAL UINSU</div>
        <h1 class="hero-title">Satu Platform. Untuk Semua Urusan <span>Kerja Praktik</span>.</h1>
        <p class="hero-desc">
            Lupakan antrean fisik dan tumpukan berkas. SIMPATIK hadir mendampingi langkah awal karirmu melalui sistem pengajuan Kerja Praktik yang cepat, transparan, dan terintegrasi.
        </p>
        <a href="#prosedur" class="btn-hero">
            Mulai Pengajuan Sekarang <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3 stat-box" data-aos="fade-up" data-aos-delay="100">
                <h2>1.2k+</h2>
                <p>Mahasiswa Aktif KP</p>
            </div>
            <div class="col-6 col-md-3 stat-box" data-aos="fade-up" data-aos-delay="200">
                <h2>850+</h2>
                <p>Instansi Mitra</p>
            </div>
            <div class="col-6 col-md-3 stat-box" data-aos="fade-up" data-aos-delay="300">
                <h2>24h</h2>
                <p>Rerata Verifikasi</p>
            </div>
            <div class="col-6 col-md-3 stat-box" data-aos="fade-up" data-aos-delay="400">
                <h2>100%</h2>
                <p>Digital Paperless</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up">
                <div class="bento-card">
                    <div class="icon-wrap"><i class="fas fa-upload"></i></div>
                    <h5 class="fw-800 mb-3">Smart Upload</h5>
                    <p class="text-muted mb-0">Cukup scan KRS dan surat permohonan, lalu unggah. Tanpa kertas, tanpa ribet, ramah lingkungan.</p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="bento-card">
                    <div class="icon-wrap"><i class="fas fa-bell"></i></div>
                    <h5 class="fw-800 mb-3">Tracking Real-time</h5>
                    <p class="text-muted mb-0">Dapatkan update otomatis saat dokumenmu diperiksa oleh Kaprodi hingga surat balasan diterbitkan.</p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="bento-card">
                    <div class="icon-wrap"><i class="fas fa-file-pdf"></i></div>
                    <h5 class="fw-800 mb-3">Output Digital Sah</h5>
                    <p class="text-muted mb-0">Unduh surat pengantar resmi berformat PDF dengan QR-Code keamanan langsung dari dashboard Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="prosedur" class="py-5" style="background: #f8fafc;">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-800" style="color: var(--primary-forest);">Hanya 3 Langkah Mudah</h2>
            <p class="text-muted">Prosedur pendaftaran Kerja Praktik mahasiswa UINSU</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-4" data-aos="fade-right">
                <div class="step-number">1</div>
                <h6 class="fw-800">Lengkapi Data</h6>
                <p class="small text-muted px-lg-4">Masuk ke portal dan isi detail instansi tempat Anda akan melaksanakan Kerja Praktik.</p>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="step-number">2</div>
                <h6 class="fw-800">Verifikasi Online</h6>
                <p class="small text-muted px-lg-4">Tim Administrasi dan Kaprodi akan meninjau kelayakan data serta berkas yang Anda unggah.</p>
            </div>
            <div class="col-md-4" data-aos="fade-left">
                <div class="step-number">3</div>
                <h6 class="fw-800">Cetak Surat</h6>
                <p class="small text-muted px-lg-4">Setelah disetujui, surat resmi siap diunduh dan dibawa ke instansi tujuan Anda.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 text-center">
    <div class="container" data-aos="zoom-in">
        <h4 class="fw-800 mb-3" style="color: var(--primary-forest);">Butuh Bantuan Teknis?</h4>
        <p class="text-muted mb-4">Tim Helpdesk SIMPATIK siap melayani kendala navigasi digital Anda.</p>
        <div class="d-flex justify-content-center gap-4 flex-wrap fw-bold">
            <span class="small"><i class="fas fa-envelope text-success me-2"></i> helpdesk.simpatik@uinsu.ac.id</span>
            <span class="small"><i class="fas fa-clock text-success me-2"></i> Sen - Jum | 08.00 - 16.00 WIB</span>
        </div>
    </div>
</section>

<footer>
    <div class="container text-center">
        <p class="small text-muted mb-0">&copy; 2025 SIMPATIK — Universitas Islam Negeri Sumatera Utara.</p>
    </div>
</footer>

<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content shadow-lg p-4">
            <div class="text-center mb-4">
                <h5 class="fw-800" style="color: var(--primary-forest);">Pilih Jalur Masuk</h5>
                <p class="small text-muted">Gunakan akun resmi civitas akademika UINSU</p>
            </div>
            <a href="/mahasiswa/login" class="btn-login-opt mb-3 shadow-sm" style="background: var(--primary-forest); color: white;">
                <span>Mahasiswa <br><small style="font-weight: 400; opacity: 0.8;">NIM & Password Portal</small></span>
                <i class="fas fa-user-graduate fa-lg"></i>
            </a>
            <a href="/admin/login" class="btn-login-opt shadow-sm" style="background: #f8fafc; color: var(--primary-forest);">
                <span>Administrator <br><small style="font-weight: 400; opacity: 0.8;">Akses Khusus Staf & Prodi</small></span>
                <i class="fas fa-user-shield fa-lg"></i>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });
</script>
</body>
</html>