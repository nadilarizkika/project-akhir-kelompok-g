<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f5132, #198754);
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .register-card { border-radius: 18px; border: none; }
        .register-title { font-weight: 700; color: #0f5132; letter-spacing: 1px; }
        .form-label { font-weight: 600; color: #0f5132; }
        .form-control { padding: 10px; border-radius: 10px; }
        .form-control:focus { border-color: #198754; box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.25); }
        .btn-register { background-color: #198754; color: #ffffff; font-weight: 600; border-radius: 30px; }
        .btn-register:hover { background-color: #157347; color: white; }
        .login-link { color: #198754; font-weight: 700; text-decoration: none; }
        .login-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card register-card shadow-sm">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 class="register-title">DAFTAR ADMIN BARU</h4>
                        <p class="text-muted mb-0">Lengkapi data untuk akses sistem</p>
                    </div>

                    <form method="POST" action="{{ route('admin.register.submit') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="contoh@simpatik.ac.id" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                        </div>

                        <button type="submit" class="btn btn-register w-100 py-2">
                            Daftar Sekarang
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0 small text-muted">Sudah punya akun? <a href="{{ route('login.admin') }}" class="login-link">Login Kembali</a></p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>