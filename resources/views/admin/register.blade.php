<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - SIMPATIK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
            color: var(--text-slate);
            padding: 20px;
        }

        .register-card {
            max-width: 420px; /* Ukuran lebih proporsional (tidak terlalu lebar) */
            width: 100%;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .register-header {
            padding: 35px 30px 20px;
            text-align: center;
        }

        .icon-badge {
            width: 60px;
            height: 60px;
            background: #ecfdf5;
            color: var(--accent-emerald);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
        }

        .register-title {
            font-weight: 800;
            color: var(--primary-green);
            font-size: 1.25rem;
            letter-spacing: -0.5px;
            margin-bottom: 4px;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            padding-left: 4px;
        }

        .input-group {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            transition: all 0.2s ease;
        }

        .input-group:focus-within {
            border-color: var(--accent-emerald);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-group-text {
            background: transparent;
            border: none;
            color: #94a3b8;
            padding-left: 18px;
        }

        .form-control {
            background: transparent;
            border: none;
            padding: 12px 15px 12px 10px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-slate);
        }

        .form-control:focus {
            box-shadow: none;
            background: transparent;
        }

        .btn-register {
            background: var(--primary-green);
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
            border-radius: 14px;
            padding: 14px;
            border: none;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #022c22;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(2, 44, 34, 0.2);
            color: white;
        }

        .login-link {
            color: var(--accent-emerald);
            font-weight: 700;
            text-decoration: none;
        }

        .login-link:hover {
            color: var(--primary-green);
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Menghilangkan border merah saat error, diganti warna emerald lembut */
        .is-invalid {
            border-color: #fda4af !important;
        }
        
        .invalid-feedback {
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 5px;
            padding-left: 5px;
        }
    </style>
</head>
<body>

<div class="register-card">
    <div class="register-header">
        <div class="icon-badge">
            <i class="fas fa-shield-halved"></i>
        </div>
        <h4 class="register-title">Pendaftaran Admin</h4>
        <p class="text-muted small">Kelola akses portal SIMPATIK</p>
    </div>

    <div class="card-body px-4 pb-5 pt-2">
        <form method="POST" action="{{ route('admin.register.submit') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Admin Name" required autofocus>
                </div>
                @error('name') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email Institusi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="admin@uinsu.ac.id" required>
                </div>
                @error('email') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                </div>
                @error('password') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-register w-100">
                Buat Akun Admin
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="mb-0 small text-muted font-weight-500">
                Sudah terdaftar? <a href="{{ route('login.admin') }}" class="login-link">Login Administrator</a>
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>