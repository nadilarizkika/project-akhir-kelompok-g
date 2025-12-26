<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SIMPATIK</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --brand-primary: #0f5132;
            --brand-gradient: linear-gradient(135deg, #0f5132 0%, #198754 100%);
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f6f8f7;
            color: #2d3436;
            font-size: 0.9rem;
        }

        #sidebar {
            width: var(--sidebar-width); height: 100vh; position: fixed;
            background: #ffffff; border-right: 1px solid rgba(0,0,0,0.05);
            padding: 1.5rem 1.2rem; z-index: 1000;
        }

        .brand-box {
            display: flex; align-items: center; margin-bottom: 2.5rem; padding: 0 10px;
        }

        .nav-pills .nav-link {
            color: #636e72; font-weight: 600; padding: 10px 15px;
            border-radius: 12px; margin-bottom: 5px; font-size: 0.85rem; transition: 0.2s;
        }

        .nav-pills .nav-link.active {
            background: var(--brand-gradient); color: white;
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.15);
        }

        #main-wrapper { margin-left: var(--sidebar-width); padding: 1.5rem 2rem; }

        .stat-card {
            background: white; border-radius: 20px; padding: 1.2rem;
            border: 1px solid #edf2f0; box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            transition: 0.3s; height: 100%;
        }

        .stat-card:hover { transform: translateY(-5px); }

        .stat-icon {
            width: 40px; height: 40px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; margin-bottom: 0.8rem;
        }

        .stat-card h2 { font-size: 1.4rem; font-weight: 800; margin: 0; }
        .stat-card h6 { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 0.5px; }

        .glass-card {
            background: white; border-radius: 20px; padding: 1.5rem; border: 1px solid #f1f5f9;
        }

        .modern-table thead th {
            font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px;
            font-weight: 800; color: #94a3b8; padding: 10px 15px; border: none;
        }

        .modern-table td {
            padding: 12px 15px; background: #ffffff; vertical-align: middle;
            font-size: 0.85rem; border-bottom: 1px solid #f8fafc;
        }

        .badge-status {
            padding: 5px 12px; font-weight: 700; font-size: 0.6rem; border-radius: 8px;
        }

        .btn-logout {
            background: #fff; color: #dc3545; border: 1px solid #fee2e2;
            padding: 8px; border-radius: 10px; font-weight: 700; font-size: 0.75rem;
        }
    </style>
</head>
<body>

<aside id="sidebar">
    <div class="brand-box">
        <div class="bg-success rounded-3 p-2 me-2 shadow-sm" style="background: var(--brand-gradient) !important;">
            <i class="fa-solid fa-leaf text-white fs-5"></i>
        </div>
        <div>
            <h6 class="fw-800 mb-0">SIMPATIK.</h6>
            <small class="text-muted fw-bold" style="font-size: 9px;">ADMIN PANEL</small>
        </div>
    </div>

    <div class="nav nav-pills flex-column">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-pie me-2"></i> Ringkasan
        </a>
        <a href="{{ route('admin.pengajuan') }}" class="nav-link {{ request()->routeIs('admin.pengajuan') ? 'active' : '' }}">
            <i class="fa-solid fa-paper-plane me-2"></i> Pengajuan
        </a>
        <a href="{{ route('admin.mahasiswa') }}" class="nav-link {{ request()->routeIs('admin.mahasiswa') ? 'active' : '' }}">
            <i class="fa-solid fa-user-graduate me-2"></i> Mahasiswa
        </a>
    </div>

    <div class="position-absolute bottom-0 start-0 w-100 p-3">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-logout w-100"><i class="fa-solid fa-power-off me-2"></i> KELUAR</button>
        </form>
    </div>
</aside>

<main id="main-wrapper">
    <header class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-800 mb-0">Ringkasan Sistem</h4>
            <p class="text-muted small mb-0">Halo, {{ Auth::guard('admin')->user()->name }}</p>
        </div>
        <div class="d-flex align-items-center gap-2 bg-white p-1 pe-3 rounded-pill border">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::guard('admin')->user()->name) }}&background=0f5132&color=fff" class="rounded-pill" width="32">
            <span class="fw-bold small">{{ Auth::guard('admin')->user()->name }}</span>
        </div>
    </header>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-warning-subtle text-warning"><i class="fa-solid fa-hourglass-half"></i></div>
                <h6 class="text-muted mb-1">Menunggu</h6>
                <h2>{{ $total_masuk }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-info-subtle text-info"><i class="fa-solid fa-circle-check"></i></div>
                <h6 class="text-muted mb-1">Disetujui</h6>
                <h2>{{ $total_disetujui }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-danger-subtle text-danger"><i class="fa-solid fa-circle-xmark"></i></div>
                <h6 class="text-muted mb-1">Ditolak</h6>
                <h2>{{ \App\Models\Pengajuan::where('status', 'ditolak')->count() }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-success-subtle text-success"><i class="fa-solid fa-database"></i></div>
                <h6 class="text-muted mb-1">Total Data</h6>
                <h2>{{ \App\Models\Pengajuan::count() }}</h2>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-5">
            <div class="glass-card h-100">
                <h6 class="fw-800 mb-3 text-uppercase text-muted" style="font-size: 0.65rem; letter-spacing: 1px;">
                    <i class="fa-solid fa-chart-pie me-2"></i>Status Pengajuan
                </h6>
                <div style="height: 180px; position: relative;">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="glass-card h-100">
                <h6 class="fw-800 mb-3 text-uppercase text-muted" style="font-size: 0.65rem; letter-spacing: 1px;">
                    <i class="fa-solid fa-circle-info me-2"></i>Informasi Infrastruktur
                </h6>
                <div class="p-3 bg-light rounded-4 mb-2 border">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="small fw-bold">Storage Link</span>
                        <span class="badge bg-success-subtle text-success" style="font-size: 9px;">AKTIF</span>
                    </div>
                    <p class="mb-0 text-muted" style="font-size: 11px;">Tautan storage berhasil terhubung. File PDF siap diverifikasi.</p>
                </div>
                <div class="p-3 bg-light rounded-4 border">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="small fw-bold">Responsivitas Aksi</span>
                        <span class="badge bg-primary-subtle text-primary" style="font-size: 9px;">READY</span>
                    </div>
                    <p class="mb-0 text-muted" style="font-size: 11px;">Fitur catatan penolakan aktif untuk memberikan transparansi kepada mahasiswa.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-800 mb-0">Pengajuan Terbaru</h6>
            <a href="{{ route('admin.pengajuan') }}" class="btn btn-dark btn-sm rounded-pill px-3" style="font-size: 10px;">Semua Data</a>
        </div>
        
        <div class="table-responsive">
            <table class="table modern-table mb-0">
                <thead>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Instansi</th>
                        <th>Tanggal</th>
                        <th class="text-center">Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuan_terbaru as $item)
                    <tr>
                        <td>
                            <div class="fw-bold text-dark">{{ $item->nama_mahasiswa }}</div>
                            <small class="text-muted" style="font-size: 10px;">{{ $item->nim }}</small>
                        </td>
                        <td><div class="small fw-semibold">{{ $item->instansi_tujuan }}</div></td>
                        <td><div class="small text-muted">{{ $item->created_at->format('d M y') }}</div></td>
                        <td class="text-center">
                            @if($item->status == 'menunggu')
                                <span class="badge-status bg-warning-subtle text-warning">MENUNGGU</span>
                            @elseif($item->status == 'disetujui')
                                <span class="badge-status bg-success-subtle text-success">DISETUJUI</span>
                            @else
                                <span class="badge-status bg-danger-subtle text-danger">DITOLAK</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.pengajuan') }}" class="btn btn-light btn-sm rounded-circle shadow-sm">
                                <i class="fa-solid fa-eye text-success small"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4 small text-muted">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Menunggu', 'Setuju', 'Tolak'],
                datasets: [{
                    data: [
                        {{ $total_masuk }}, 
                        {{ $total_disetujui }}, 
                        {{ \App\Models\Pengajuan::where('status', 'ditolak')->count() }}
                    ],
                    backgroundColor: ['#ffc107', '#198754', '#dc3545'],
                    hoverOffset: 10,
                    borderWidth: 0
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: { 
                            usePointStyle: true, 
                            font: { family: "'Plus Jakarta Sans', sans-serif", size: 10 } 
                        }
                    }
                },
                cutout: '80%'
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>