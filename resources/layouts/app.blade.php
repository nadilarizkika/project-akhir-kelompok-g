<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIMPATIK</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #0d6efd, #4ea3ff);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 22px;
        }

        .hero {
            height: 85vh;
            background: 
                linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
                url('{{ asset("images/hero.jpg") }}') center/cover no-repeat;
            color: white;
            display: flex;
            align-items: center;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 48px;
        }

        .hero p {
            font-size: 18px;
            max-width: 750px;
        }

        .btn-ajukan {
            background-color: #198754;
            padding: 12px 30px;
            font-size: 18px;
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
