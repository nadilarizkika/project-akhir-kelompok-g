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
            --admin-pink: #f472b6;
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

        .login-container {
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.8s ease-out;
        }

        .admin-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(6, 78, 59, 0.1);
            padding: 40px;
        }

        .shield-icon {
            width: 70px;
            height: 70px;
            background: var(--admin-dark);
            color: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            box-shadow: 0 15px 30px rgba(6, 78, 59, 0.2);
        }

        .brand-logo-text {
            font-weight: 800;
            font-size: 1rem;
            letter-spacing: 0.8rem;
            text-transform: uppercase;
            color: var(--admin-emerald);
            margin-right: -0.8rem;
            text-align: center;
            display: block;
        }

        .login-title {
            font-weight: 800;
            color: var(--admin-dark);
            margin-top: 10px;
        }

        .form-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #94a3b8;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group-custom i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #cbd5e1;
            transition: 0.3s;
        }

        .form-control-modern {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border-radius: 14px;
            border: 2px solid #f1f5f9;
            background: #f8fafc;
            font-size: 0.9rem;
            font-weight: 600;
            transition: 0.3s;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: var(--admin-pink);
            background: white;
            box-shadow: 0 10px 20px rgba(244, 114, 182, 0.1);
        }

        .form-control-modern:focus + i {
            color: var(--admin-pink);
        }

        .btn-admin-login {
            background: var(--admin-dark);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 16px;
            font-weight: 700;
            width: 100%;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: 0.3s;
            margin-top: 10px;
            box-shadow: 0 10px 20px rgba(6, 78, 59, 0.2);
        }

        .btn-admin-login:hover {
            background: var(--admin-emerald);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(16, 185, 129, 0.3);
            color: white;
        }

        .register-link {
            color: var(--admin-emerald);
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
        }

        .register-link:hover { color: var(--admin-pink); }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="login-container">
    
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <small class="fw-bold">{{ session('success') }}</small>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="admin-card">
        <div class="text-center mb-4">
            <div class="shield-icon">
                <i class="fas fa-user-shield fa-2x"></i>
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
                           class="form-control-modern @error('email') is-invalid @enderror" 
                           placeholder="admin@uinsu.ac.id" 
                           value="{{ old('email') }}" required autofocus>
                    <i class="fas fa-envelope"></i>
                </div>
                @error('email')
                    <div class="text-danger small mt-n2 mb-3 fw-bold" style="font-size: 0.7rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-box">
                <label class="form-label">Security Password</label>
                <div class="input-group-custom">
                    <input type="password" name="password" 
                           class="form-control-modern @error('password') is-invalid @enderror" 
                           placeholder="••••••••••••" required>
                    <i class="fas fa-key"></i>
                </div>
                @error('password')
                    <div class="text-danger small mt-n2 mb-3 fw-bold" style="font-size: 0.7rem;">{{ $message }}</div>
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
                <a href="/" class="text-muted text-decoration-none small">
                    <i class="fas fa-arrow-left me-1"></i> Return to Gateway
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>