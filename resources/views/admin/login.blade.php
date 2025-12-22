<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
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

        /* CARD */
        .login-card {
            border-radius: 18px;
            border: none;
        }

        /* TITLE */
        .login-title {
            font-weight: 700;
            color: #0f5132;
            letter-spacing: 1px;
        }

        /* FORM */
        .form-label {
            font-weight: 600;
            color: #0f5132;
        }

        .form-control {
            padding: 12px;
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.25);
        }

        /* BUTTON */
        .btn-login {
            background-color: #198754;
            color: #ffffff;
            font-weight: 600;
            border-radius: 30px;
        }

        .btn-login:hover {
            background-color: #157347;
        }

        /* LINK */
        .back-link {
            color: #0f5132;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

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
                                class="form-control" 
                                placeholder="Masukkan Email"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input 
                                type="password" 
                                name="password"
                                class="form-control" 
                                placeholder="Masukkan Password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-login w-100 py-2">
                            Login
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="/" class="back-link text-decoration-none">
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
