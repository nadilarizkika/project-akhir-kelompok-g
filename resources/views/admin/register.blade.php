<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            background: radial-gradient(circle at top right, #1e7e34, #0f5132);
            display: flex;
            align-items: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2d3436;
        }

        .register-card {
            border-radius: 24px;
            border: none;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .register-header {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #edf2f7;
        }

        .register-title {
            font-weight: 800;
            color: #0f5132;
            letter-spacing: -0.5px;
            margin-bottom: 5px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .input-group-text {
            background-color: transparent;
            border-right: none;
            color: #198754;
        }

        .form-control {
            padding: 12px;
            border-radius: 12px;
            border-left: none;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #dee2e6;
            box-shadow: none;
            background-color: #fff;
        }

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: #198754;
        }

        .btn-register {
            background: linear-gradient(135deg, #198754, #0f5132);
            color: #ffffff;
            font-weight: 700;
            border-radius: 12px;
            padding: 14px;
            border: none;
            box-shadow: 0 10px 20px rgba(25, 135, 84, 0.3);
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(25, 135, 84, 0.4);
            color: white;
            filter: brightness(1.1);
        }

        .login-link {
            color: #198754;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
        }

        .login-link:hover {
            color: #0f5132;
            text-decoration: underline;
        }

        /* Animasi masuk */
        .fade-in {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5 fade-in">

            <div class="card register-card">
                <div class="register-header">
                    <div class="mb-3">
                        <i class="fas fa-user-shield fa-3x text-success"></i>
                    </div>
                    <h4 class="register-title">DAFTAR ADMIN</h4>
                    <p class="text-muted small mb-0">Sistem Informasi Pengajuan Praktik (SIMPATIK)</p>
                </div>

                <div class="card-body p-4 p-lg-5">
                    <form method="POST" action="{{ route('admin.register.submit') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus>
                            </div>
                            @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="contoh@simpatik.ac.id" required>
                            </div>
                            @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter" required>
                            </div>
                            @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-register w-100 mb-3">
                            <i class="fas fa-paper-plane me-2"></i>Daftar Sekarang
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0 small text-muted">Sudah memiliki akun? <a href="{{ route('login.admin') }}" class="login-link">Login Kembali</a></p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4 text-white-50 small">
                &copy; 2025 SIMPATIK. All rights reserved.
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>