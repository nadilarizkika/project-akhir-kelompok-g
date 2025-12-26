<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mahasiswa | SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-emerald: #10b981;
            --accent-pink: #f472b6;
            --dark-emerald: #064e3b;
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

        .auth-card {
            width: 100%;
            max-width: 500px; /* Ukuran kompak untuk register */
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 30px;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.08);
            padding: 40px;
        }

        .brand-logo-text {
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 0.8rem;
            text-transform: uppercase;
            color: var(--primary-emerald);
            margin-right: -0.8rem;
            display: block;
            text-align: center;
        }

        .form-header h4 {
            font-weight: 800;
            color: var(--dark-emerald);
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

        .btn-register {
            background: var(--dark-emerald);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            width: 100%;
            font-size: 0.85rem;
            letter-spacing: 1px;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: var(--accent-pink);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(244, 114, 182, 0.3);
        }

        .login-link {
            color: var(--primary-emerald);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .login-link:hover {
            color: var(--accent-pink);
        }
    </style>
</head>
<body>

<div class="auth-card">
    <div class="text-center mb-4">
        <div class="mb-3 d-inline-block" style="background: white; width: 50px; height: 50px; border-radius: 15px; line-height: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
            <i class="fas fa-user-plus text-success"></i>
        </div>
        <span class="brand-logo-text">SIMPATIK</span>
        <div class="form-header mt-3">
            <h4>Buat Akun Baru</h4>
            <p class="text-muted small">Lengkapi data diri untuk pendaftaran Mahasiswa</p>
        </div>
    </div>

    <form method="POST" action="{{ route('mahasiswa.register.submit') }}">
        @csrf

        <div class="input-box">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="form-control-modern @error('name') is-invalid @enderror" 
                   placeholder="Masukkan nama sesuai KTM" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger small mt-1 fw-bold" style="font-size: 0.7rem;">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-box">
            <label>NIM (Nomor Induk Mahasiswa)</label>
            <input type="text" name="nim" class="form-control-modern @error('nim') is-invalid @enderror" 
                   placeholder="Contoh: 121705XXXX" value="{{ old('nim') }}" required>
            @error('nim')
                <div class="text-danger small mt-1 fw-bold" style="font-size: 0.7rem;">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control-modern" 
                           placeholder="••••••••" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-box">
                    <label>Konfirmasi</label>
                    <input type="password" name="password_confirmation" class="form-control-modern" 
                           placeholder="••••••••" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn-register">
            DAFTAR SEKARANG <i class="fas fa-check-circle ms-1"></i>
        </button>
    </form>

    <div class="mt-4 text-center">
        <p class="small text-muted mb-1">Sudah terdaftar sebelumnya?</p>
        <a href="{{ route('mahasiswa.login') }}" class="login-link">Kembali ke Login</a>
        
        <div class="mt-4 pt-2 border-top">
            <a href="{{ route('home') }}" class="text-muted text-decoration-none" style="font-size: 0.75rem;">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>