<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIMPATIK</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        padding-top: 80px; /* tinggi navbar */
        background-color: #ffffff;
    }

    /* ================= NAVBAR ================= */
    .navbar {
        background-color: #0f5132;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 22px;
        color: #ffffff !important;
    }

    .nav-link {
        color: #ffffff !important;
        font-weight: 500;
    }

    .nav-link:hover {
        text-decoration: underline;
    }

    /* ================= HERO ================= */
    .hero {
        height: 85vh;
        background:
            linear-gradient(rgba(255,255,255,0.92), rgba(255,255,255,0.92)),
            url('{{ asset("images/hero.jpg") }}') center/cover no-repeat;
        display: flex;
        align-items: center;
    }

    .hero h1 {
        font-weight: 700;
        font-size: 46px;
        color: #0f5132;
    }

    .hero p {
        font-size: 18px;
        max-width: 750px;
        color: #333;
    }

    .btn-ajukan {
        background-color: #198754;
        padding: 12px 32px;
        font-size: 18px;
        border-radius: 30px;
        color: white;
    }

    .btn-ajukan:hover {
        background-color: #157347;
    }

    /* ================= SCROLL FIX (PENTING) ================= */
    section {
        scroll-margin-top: 100px; /* agar anchor tidak ketutup navbar */
    }

    /* ================= INFORMASI ================= */
    #informasi {
        background-color: #e9f5ef;
    }

    #informasi h2 {
        color: #0f5132;
        font-weight: 700;
    }

    .info-card {
        background-color: #ffffff;
        border-left: 5px solid #198754;
        transition: transform 0.2s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
    }

    /* ================= KONTAK ================= */
    #kontak {
        background-color: #ffffff;
    }

    /* ================= FOOTER ================= */
    footer {
        background-color: #0f5132;
        color: white;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        body {
            padding-top: 70px;
        }

        section {
            scroll-margin-top: 90px;
        }

        .hero h1 {
            font-size: 34px;
        }
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="#home">
            SIMPATIK
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#informasi">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#kontak">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light px-4 rounded-pill" href="{{ route('login.admin') }}">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section id="home" class="hero">
    <div class="container">
        <h1 class="mb-4">
            SISTEM INFORMASI PENGAJUAN <br> KERJA PRAKTIK
        </h1>

        <p class="mb-5">
            Sistem ini digunakan untuk mengajuan pelaksanaan kerja praktik di Universitas Islam Negeri Sumatera Utara
        </p>

        <a href="{{ route('pengajuan.create') }}" class="btn btn-ajukan shadow">
            Ajukan Sekarang
        </a>
    </div>
</section>

<!-- INFORMASI -->
<section id="informasi" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">

                <h2 class="mb-4">Informasi Kerja Praktik (KP)</h2>

                <p class="mb-4">
                    Kerja Praktik merupakan mata kuliah wajib yang bertujuan
                    meningkatkan kemampuan mahasiswa melalui pengalaman kerja
                    langsung di instansi.
                </p>

                <div class="row mt-4">
                    <div class="col-md-4 mb-3">
                        <div class="card info-card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="fw-bold">Syarat KP</h5>
                                <p class="mb-0">
                                    Mahasiswa telah memenuhi jumlah SKS
                                    sesuai ketentuan fakultas.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card info-card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="fw-bold">Alur Pengajuan</h5>
                                <p class="mb-0">
                                    Isi data → Upload berkas →
                                    Verifikasi → Persetujuan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card info-card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="fw-bold">Durasi KP</h5>
                                <p class="mb-0">
                                    Minimal 1 bulan atau sesuai
                                    kebijakan program studi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- KONTAK -->
<section id="kontak" class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Kontak</h2>
        <p class="mb-0">
            Fakultas Sains dan Teknologi <br>
            Universitas Islam Negeri Sumatera Utara
        </p>
    </div>
</section>

<footer class="py-3 text-center">
    © {{ date('Y') }} SIMPATIK - UIN Sumatera Utara
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
