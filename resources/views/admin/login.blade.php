<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f5132, #198754);
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card { border-radius: 18px; border: none; }
        .login-title { font-weight: 700; color: #0f5132; letter-spacing: 1px; }
        .form-label { font-weight: 600; color: #0f5132; }
        .form-control { padding: 12px; border-radius: 10px; }
        .form-control:focus { border-color: #198754; box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.25); }
        .btn-login { background-color: #198754; color: #ffffff; font-weight: 600; border-radius: 30px; }
        .btn-login:hover { background-color: #157347; color: white; }
        .back-link { color: #0f5132; font-weight: 500; }
        .register-link { color: #198754; font-weight: 700; text-decoration: none; }
        .register-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card login-card shadow-sm">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 class="login-title">LOGIN ADMIN</h4>
                        <p class="text-muted mb-0">Sistem Informasi KP</p>
                    </div>

                    <form method="POST" action="{{ route('login.admin') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input 
                                type="email" 
                                name="email"
                                class="form-control @error('email') is-invalid @enderror" 
                                placeholder="Masukkan Email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input 
                                type="password" 
                                name="password"
                                class="form-control @error('password') is-invalid @enderror" 
                                placeholder="Masukkan Password"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-login w-100 py-2">
                            Login
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <p class="mb-0 small text-muted">Belum punya akun admin?</p>
                        <a href="{{ route('admin.register') }}" class="register-link">
                            Daftar Admin Baru
                        </a>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <a href="/" class="back-link text-decoration-none small">
                            ← Kembali ke Home
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