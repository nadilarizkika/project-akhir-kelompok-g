<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIMPATIK - Admin</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f4f7f6; }
        .header {
            background: #14532d;
            color: #fff;
            padding: 15px 25px;
            font-size: 20px;
            font-weight: bold;
        }
        .sidebar {
            width: 230px;
            background: #e7f3ec;
            min-height: calc(100vh - 60px);
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #14532d;
            font-weight: 500;
        }
        .sidebar a:hover {
            background: #cce5d5;
        }
        .content {
            padding: 25px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="header">SIMPATIK - Admin</div>

<div class="d-flex">
    <div class="sidebar">
        <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
        <a href="{{ url('/admin/pengajuan') }}">Data Pengajuan KP</a>
        <a href="{{ url('/admin/mahasiswa') }}">Data Mahasiswa</a>
        <a href="{{ url('/admin/laporan') }}">Laporan</a>
        <a href="{{ url('/logout') }}" class="text-danger">Logout</a>
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>
