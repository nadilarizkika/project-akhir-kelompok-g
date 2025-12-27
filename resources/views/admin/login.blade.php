<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | SIMPATIK Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --admin-dark: #064e3b;
            --admin-emerald: #10b981;
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
        }

        .login-container {
            width: 100%;
            max-width: 400px; /* Ukuran diperkecil agar lebih proporsional */
            animation: fadeIn 0.8s ease-out;
        }

        .admin-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 28px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 40px;
        }

        .shield-icon {
            width: 65px;
            height: 65px;
            background: #ecfdf5;
            color: var(--admin-emerald);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .brand-logo-text {
            font-weight: 800;
            font-size: 0.75rem;
            letter-spacing: 0.5rem;
            text-transform: uppercase;
            color: var(--admin-emerald);
            margin-right: -0.5rem;
            text-align: center;
            display: block;
        }

        .login-title {
            font-weight: 800;
            color: var(--admin-dark);
            font-size: 1.25rem;
            margin-top: 5px;
        }

        .form-label {
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
            padding-left: 5px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            transition: 0.3s;
        }

        .input-group-custom:focus-within {
            border-color: var(--admin-emerald);
            background: white;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-group-custom i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            transition: 0.3s;
        }

        .form-control-modern {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: none;
            background: transparent;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-slate);
        }

        .form-control-modern:focus {
            outline: none;
        }

        .input-group-custom:focus-within i {
            color: var(--admin-emerald);
        }

        .btn-admin-login {
            background: var(--admin-dark);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 14px;
            font-weight: 700;
            width: 100%;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-admin-login:hover {
            background: #022c22;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(2, 44, 34, 0.2);
            color: white;
        }

        .register-link {
            color: var(--admin-emerald);
            text-decoration: none;
            font-weight: 700;
        }

        .register-link:hover { color: var(--admin-dark); text-decoration: underline; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="login-container">
    
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center" role="alert" style="background: #ecfdf5; color: #065f46;">
            <i class="fas fa-check-circle me-2"></i>
            <small class="fw-bold">{{ session('success') }}</small>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style="font-size: 0.7rem;"></button>
        </div>
    @endif

    <div class="admin-card">
        <div class="text-center mb-4">
            <div class="shield-icon">
                <i class="fas fa-shield-halved fa-2x"></i>
            </div>
            <span class="brand-logo-text">SIMPATIK</span>
            <h4 class="login-title">Administrator</h4>
            <p class="text-muted small">Access protected management area</p>
        </div>

        <form method="POST" action="{{ route('login.admin') }}">
            @csrf

            <div class="input-box">
                <label class="form-label">Email Address</label>
                <div class="input-group-custom">
                    <input type="email" name="email" 
                           class="form-control-modern" 
                           placeholder="admin@uinsu.ac.id" 
                           value="{{ old('email') }}" required autofocus>
                    <i class="far fa-envelope"></i>
                </div>
                @error('email')
                    <div class="text-danger small mt-n2 mb-3 fw-bold" style="font-size: 0.7rem; padding-left: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-box">
                <label class="form-label">Security Password</label>
                <div class="input-group-custom">
                    <input type="password" name="password" 
                           class="form-control-modern" 
                           placeholder="••••••••••••" required>
                    <i class="fas fa-fingerprint"></i>
                </div>
                @error('password')
                    <div class="text-danger small mt-n2 mb-3 fw-bold" style="font-size: 0.7rem; padding-left: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-admin-login">
                SECURE LOGIN <i class="fas fa-unlock-alt ms-2"></i>
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="small text-muted mb-1">Authorization issues?</p>
            <a href="{{ route('admin.register') }}" class="register-link small">Request Admin Access</a>
            
            <div class="mt-4 pt-3 border-top border-light">
                <a href="/" class="text-muted text-decoration-none small" style="font-weight: 600;">
                    <i class="fas fa-arrow-left me-1"></i> Return to Gateway
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>