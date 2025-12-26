<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Mahasiswa - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f5132, #198754);
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card { border-radius: 18px; border: none; overflow: hidden; }
        .login-left {
            background: #0f5132;
            color: white;
            padding: 40px;
        }
        .login-left h3 { font-weight: 700; letter-spacing: 1px; }
        .login-right { padding: 40px; }
        .login-title { font-weight: 700; color: #0f5132; }
        .form-label { font-weight: 600; color: #0f5132; }
        .form-control { padding: 12px; border-radius: 10px; }
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(25,135,84,.25);
        }
        .btn-login {
            background-color: #198754;
            border-radius: 30px;
            font-weight: 600;
            color: white;
        }
        .btn-login:hover { background-color: #157347; }
        .register-link { color: #198754; font-weight: 700; text-decoration: none; }
        .register-link:hover { text-decoration: underline; }

        @media (max-width: 768px) {
            .login-left { display: none; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="card login-card shadow-sm">
                <div class="row g-0">

                    <!-- LEFT -->
                    <div class="col-md-5 login-left">
                        <h3>SIMPATIK</h3>
                        <p class="mt-3">
                            Sistem Informasi Pengajuan<br>
                            Kerja Praktik UIN
                        </p>
                        <small>Login Mahasiswa</small>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-md-7 login-right">
                        <h4 class="login-title mb-4">Login Mahasiswa</h4>

                        <form method="POST" action="{{ route('mahasiswa.login.post') }}">
                            @csrf

                            <div class="mb-3">
    <label class="form-label">NIM</label>
    <input type="text"
           name="nim"
           class="form-control @error('nim') is-invalid @enderror"
           placeholder="Masukkan NIM"
           value="{{ old('nim') }}"
           required>
    @error('nim')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control"
                                    placeholder="••••••••"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-login w-100 py-2">
                                Login
                            </button>
                        </form>

                        <div class="text-center mt-3">
                            <p class="mb-0 small text-muted">Belum punya akun?</p>
                            <a href="{{ route('mahasiswa.register') }}" class="register-link">
                                Daftar Mahasiswa
                            </a>
                        </div>

                        <hr class="my-4">

                        <div class="text-center">
                            <a href="/" class="text-decoration-none text-success small">
                                ← Kembali ke Home
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
