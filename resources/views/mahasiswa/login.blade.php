<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mahasiswa | SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            /* Palette Hijau Tua Premium */
            --deep-forest: #042f2e;     /* Hijau Botol Sangat Gelap */
            --emerald-accent: #10b981;  /* Hijau Emerald untuk aksen */
            --slate-navy: #0f172a;      /* Navy Slate untuk teks */
            --soft-grey: #f8fafc;       /* Background input */
            --border-color: #e2e8f0;
        }

        body {
            min-height: 100vh;
            /* Gradient background yang lebih kalem dan profesional */
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 20px;
        }

        /* Dekorasi background (opsional) */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at 90% 10%, #ecfdf5 0%, transparent 40%);
            z-index: -1;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 850px; 
            z-index: 10;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        }

        /* Sisi Branding - Hijau Tua */
        .brand-side {
            background: linear-gradient(135deg, var(--deep-forest) 0%, #064e3b 100%);
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
            font-size: 1.2rem;
            letter-spacing: 0.8rem;
            text-transform: uppercase;
            color: var(--emerald-accent); /* Aksen Hijau Terang */
            margin-right: -0.8rem;
            display: block;
            margin-top: 15px;
        }

        .brand-sub {
            font-size: 0.65rem;
            letter-spacing: 0.2rem;
            text-transform: uppercase;
            opacity: 0.7;
        }

        /* Sisi Form */
        .form-side {
            padding: 45px 55px;
            background: white;
        }

        .form-header h4 {
            font-weight: 800;
            color: var(--deep-forest);
            margin-bottom: 5px;
            letter-spacing: -0.5px;
        }

        .input-box {
            margin-bottom: 20px;
        }

        .input-box label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
            display: block;
        }

        .form-control-modern {
            width: 100%;
            padding: 13px 18px;
            border-radius: 14px;
            border: 2px solid var(--border-color);
            background: var(--soft-grey);
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--slate-navy);
            transition: 0.3s;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: var(--emerald-accent);
            background: white;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.06);
        }

        /* Button Login - Deep Forest */
        .btn-login {
            background: var(--deep-forest);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 15px;
            font-weight: 700;
            width: 100%;
            font-size: 0.85rem;
            transition: 0.3s;
            margin-top: 10px;
            letter-spacing: 1px;
        }

        .btn-login:hover {
            background: #000;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .register-link {
            color: var(--emerald-accent);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.2s;
        }

        .register-link:hover {
            color: var(--deep-forest);
        }

        @media (max-width: 768px) {
            .auth-card { flex-direction: column; }
            .brand-side { padding: 40px 20px; }
            .form-side { padding: 35px 25px; }
        }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card row g-0">
        
        <div class="col-md-5 brand-side">
            <div class="mb-2">
                <div style="background: rgba(255,255,255,0.1); width: 70px; height: 70px; border-radius: 22px; display: flex; align-items: center; justify-content: center; margin: 0 auto; border: 1px solid rgba(255,255,255,0.2);">
                    <i class="fas fa-leaf fa-xl" style="color: var(--emerald-accent);"></i>
                </div>
            </div>
            <span class="brand-logo-text">SIMPATIK</span>
            <span class="brand-sub">Digital Academic Portal</span>
        </div>

        <div class="col-md-7 form-side">
            <div class="form-header mb-4 text-center text-md-start">
                <h4>Selamat Datang</h4>
                <p class="text-muted small">Silakan masuk menggunakan kredensial mahasiswa Anda.</p>
            </div>

            <form action="{{ route('mahasiswa.login.post') }}" method="POST">
                @csrf
                
                <div class="input-box">
                    <label>NIM Mahasiswa</label>
                    <input type="text" name="nim" class="form-control-modern @error('nim') is-invalid @enderror" 
                           placeholder="Masukkan nomor induk" value="{{ old('nim') }}" required autofocus>
                    @error('nim')
                        <div class="text-danger small mt-1 fw-bold" style="font-size: 0.7rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-box">
                    <div class="d-flex justify-content-between">
                        <label>Password Akun</label>
                        <a href="#" class="text-muted text-decoration-none fw-bold" style="font-size: 0.6rem; letter-spacing: 1px;">LUPA KATA SANDI?</a>
                    </div>
                    <input type="password" name="password" class="form-control-modern" 
                           placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-login">
                    MASUK PORTAL <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="small text-muted mb-1">Belum terdaftar di sistem?</p>
                <a href="{{ route('mahasiswa.register') }}" class="register-link">Buat Akun Baru</a>
                
                <div class="mt-4 pt-3 border-top">
                    <a href="{{ route('home') }}" class="text-muted text-decoration-none hover-opacity" style="font-size: 0.75rem;">
                        <i class="fas fa-chevron-left me-1"></i> Kembali ke Halaman Utama
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>