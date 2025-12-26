<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Mahasiswa - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f5132, #198754);
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card { border-radius: 18px; border: none; }
        .title { font-weight: 700; color: #0f5132; letter-spacing: 1px; }
        .form-label { font-weight: 600; color: #0f5132; }
        .form-control { padding: 12px; border-radius: 10px; }
        .btn-register {
            background-color: #198754;
            color: white;
            font-weight: 600;
            border-radius: 30px;
        }
        .btn-register:hover { background-color: #157347; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 class="title">REGISTER MAHASISWA</h4>
                        <p class="text-muted mb-0">Sistem Informasi KP</p>
                    </div>

                    <form method="POST" action="{{ route('mahasiswa.register.submit') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-register w-100 py-2">
                            Daftar
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('mahasiswa.login') }}" class="text-success text-decoration-none">
                            Sudah punya akun? Login
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
