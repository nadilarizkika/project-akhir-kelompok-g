<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-emerald: #10b981;
            --accent-pink: #f472b6;
            --dark-emerald: #064e3b;
            --soft-bg: #fdf2f8;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #fdf2f8 0%, #ecfdf5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 20px;
        }

        /* Ukuran container diperkecil */
        .auth-wrapper {
            width: 100%;
            max-width: 850px; 
            z-index: 10;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.08);
        }

        /* Sisi Branding dibuat lebih ramping */
        .brand-side {
            background: linear-gradient(135deg, var(--dark-emerald) 0%, #10b981 100%);
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .brand-logo-text {
            font-weight: 800;
            font-size: 1.1rem; /* Ukuran teks dikurangi */
            letter-spacing: 0.8rem; /* Jarak huruf disesuaikan agar rapi */
            text-transform: uppercase;
            color: var(--accent-pink);
            margin-right: -0.8rem;
            display: block;
        }

        .brand-sub {
            font-size: 0.65rem;
            letter-spacing: 0.2rem;
            text-transform: uppercase;
            opacity: 0.7;
        }

        /* Sisi Form dengan padding lebih kecil */
        .form-side {
            padding: 40px 50px;
            background: white;
        }

        .form-header h4 {
            font-weight: 800;
            color: var(--dark-emerald);
            margin-bottom: 5px;
        }

        .input-box {
            margin-bottom: 18px;
        }

        .input-box label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #94a3b8;
            margin-bottom: 6px;
            display: block;
        }

        .form-control-modern {
            width: 100%;
            padding: 12px 18px;
            border-radius: 12px;
            border: 2px solid #f1f5f9;
            background: #f8fafc;
            font-size: 0.9rem;
            font-weight: 600;
            transition: 0.3s;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: var(--accent-pink);
            background: white;
            box-shadow: 0 5px 15px rgba(244, 114, 182, 0.1);
        }

        .btn-login {
            background: var(--dark-emerald);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            width: 100%;
            font-size: 0.85rem;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: var(--accent-pink);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(244, 114, 182, 0.3);
        }

        .register-link {
            color: var(--primary-emerald);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .auth-card { flex-direction: column; }
            .brand-side { padding: 30px; }
            .form-side { padding: 30px 20px; }
        }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card row g-0">
        
        <div class="col-md-5 brand-side">
            <div class="mb-3">
                <div style="background: white; width: 60px; height: 60px; border-radius: 18px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                    <i class="fas fa-leaf fa-lg" style="color: var(--primary-emerald);"></i>
                </div>
            </div>
            <span class="brand-logo-text">SIMPATIK</span>
            <span class="brand-sub">Portal Login</span>
        </div>

        <div class="col-md-7 form-side">
            <div class="form-header mb-4 text-center text-md-start">
                <h4>Selamat Datang!</h4>
                <p class="text-muted small">Silakan login dengan akun Anda.</p>
            </div>

            <form action="{{ route('mahasiswa.login.post') }}" method="POST">
                @csrf
                
                <div class="input-box">
                    <label>NIM Mahasiswa</label>
                    <input type="text" name="nim" class="form-control-modern @error('nim') is-invalid @enderror" 
                           placeholder="Masukkan NIM" value="{{ old('nim') }}" required autofocus>
                    @error('nim')
                        <div class="text-danger small mt-1 fw-bold" style="font-size: 0.7rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-box">
                    <div class="d-flex justify-content-between">
                        <label>Password</label>
                        <a href="#" class="text-muted text-decoration-none fw-bold" style="font-size: 0.6rem;">LUPA?</a>
                    </div>
                    <input type="password" name="password" class="form-control-modern" 
                           placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-login">
                    LOGIN <i class="fas fa-sign-in-alt ms-1"></i>
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="small text-muted mb-1">Belum punya akun?</p>
                <a href="{{ route('mahasiswa.register') }}" class="register-link">Daftar Sekarang</a>
                
                <div class="mt-4 pt-2 border-top">
                    <a href="{{ route('home') }}" class="text-muted text-decoration-none" style="font-size: 0.75rem;">
                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>