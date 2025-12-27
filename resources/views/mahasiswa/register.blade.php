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
        --primary-green: #064e3b;
        --accent-emerald: #10b981;
        --text-slate: #334155;
        --bg-gradient: radial-gradient(circle at top right, #065f46, #022c22);
    }

    body {
        min-height: 100vh;
        background: var(--bg-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 0;
        padding: 20px;
        color: var(--text-slate);
    }

    .auth-card {
        width: 100%;
        max-width: 500px;
        background: rgba(255, 255, 255, 0.98);
        border-radius: 28px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        padding: 40px;
        animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .brand-logo-text {
        font-weight: 800;
        font-size: 1.1rem;
        letter-spacing: 0.6rem;
        text-transform: uppercase;
        color: var(--accent-emerald);
        margin-right: -0.6rem;
        display: block;
        text-align: center;
    }

    .form-header h4 {
        font-weight: 800;
        color: var(--primary-green);
    }

    .input-box {
        margin-bottom: 18px;
    }

    .input-box label {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #64748b;
        margin-bottom: 6px;
        display: block;
        letter-spacing: 0.5px;
    }

    .form-control-modern {
        width: 100%;
        padding: 12px 18px;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        font-size: 0.9rem;
        font-weight: 600;
        transition: 0.3s;
        color: var(--text-slate);
    }

    .form-control-modern:focus {
        outline: none;
        border-color: var(--accent-emerald);
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.12);
    }

    .btn-register {
        background: var(--primary-green);
        color: white;
        border: none;
        border-radius: 14px;
        padding: 14px;
        font-weight: 700;
        width: 100%;
        font-size: 0.85rem;
        letter-spacing: 1px;
        transition: 0.3s;
        margin-top: 10px;
    }

    .btn-register:hover {
        background: #022c22;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(2, 44, 34, 0.25);
    }

    .login-link {
        color: var(--accent-emerald);
        text-decoration: none;
        font-weight: 700;
        font-size: 0.85rem;
        transition: 0.3s;
    }

    .login-link:hover {
        color: var(--primary-green);
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
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