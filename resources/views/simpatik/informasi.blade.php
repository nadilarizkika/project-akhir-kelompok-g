<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Kerja Praktik - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        /* NAVBAR (SAMA SEPERTI HOME) */
        .navbar {
            background: linear-gradient(90deg, #0d6efd, #4ea3ff);
            position: relative;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 22px;
        }

        .content {
            padding-top: 80px;
            padding-bottom: 60px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="/">SIMPATIK</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('informasi') }}">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light px-4" href="{{ route('login.admin') }}">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- KONTEN INFORMASI -->
<div class="container content">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="mb-4">Informasi Kerja Praktik (KP)</h3>

                    <p>
                        Kerja Praktik (KP) merupakan mata kuliah wajib yang harus
                        ditempuh oleh mahasiswa sebagai bentuk penerapan ilmu
                        yang diperoleh di bangku perkuliahan ke dunia kerja nyata.
                    </p>

                    <h5 class="mt-4">📌 Persyaratan Kerja Praktik</h5>
                    <ul>
                        <li>Mahasiswa aktif</li>
                        <li>Telah menempuh mata kuliah sesuai ketentuan prodi</li>
                        <li>Mendapat persetujuan dosen pembimbing</li>
                    </ul>

                    <h5 class="mt-4">🗓️ Durasi Kerja Praktik</h5>
                    <p>
                        Pelaksanaan KP dilakukan selama minimal 1–3 bulan
                        sesuai dengan ketentuan instansi dan universitas.
                    </p>

                    <h5 class="mt-4">📄 Dokumen yang Diperlukan</h5>
                    <ul>
                        <li>Surat pengantar KP</li>
                        <li>Proposal / surat permohonan</li>
                        <li>Laporan akhir KP</li>
                    </ul>

                    <div class="mt-4">
                        <a href="{{ route('pengajuan.create') }}" class="btn btn-success">
                            Ajukan Kerja Praktik
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
