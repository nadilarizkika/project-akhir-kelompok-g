<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pengajuan KP - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #eef6f1; /* hijau sangat lembut */
        }

        /* NAVBAR */
        .navbar {
            background-color: #0f5132;
        }

        .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }

        /* CARD */
        .card {
            border-radius: 16px;
            border: none;
        }

        .card-header {
            background-color: #ffffff;
            color: #0f5132;
            font-weight: 700;
            font-size: 18px;
            border-bottom: 2px solid #e9f5ef;
        }

        /* FORM */
        .form-label {
            font-weight: 600;
            color: #0f5132;
        }

        .form-control {
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.25);
        }

        /* BUTTON */
        .btn-submit {
            background-color: #198754;
            color: #ffffff;
            padding: 10px 28px;
            border-radius: 30px;
            font-weight: 600;
        }

        .btn-submit:hover {
            background-color: #157347;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand" href="/">
            SIMPATIK
        </a>
    </div>
</nav>

<!-- FORM -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header">
                    Form Pengajuan Kerja Praktik
                </div>

                <div class="card-body px-4 py-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" class="form-control" placeholder="Masukkan NIM">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Program Studi</label>
                            <input type="text" class="form-control" placeholder="Contoh: Sistem Informasi">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Instansi Tujuan KP</label>
                            <input type="text" class="form-control" placeholder="Nama instansi/perusahaan">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Instansi</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Mulai KP</label>
                                <input type="date" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Selesai KP</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Surat Pengantar (PDF)</label>
                            <input type="file" class="form-control">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-submit">
                                Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
