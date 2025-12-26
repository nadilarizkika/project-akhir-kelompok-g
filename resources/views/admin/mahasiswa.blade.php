<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Mahasiswa — SIMPATIK</title>
    
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
            font-size: 0.85rem;
        }
        
        /* Sidebar Ramping & Konsisten */
        #sidebar { 
            width: var(--sidebar-width); height: 100vh; position: fixed; 
            background: #ffffff; border-right: 1px solid rgba(0,0,0,0.05); 
            padding: 1.5rem 1.2rem; z-index: 1000;
        }
        
        .brand-box {
            display: flex; align-items: center; margin-bottom: 2.5rem; padding: 0 10px;
        }

        #main-wrapper { margin-left: var(--sidebar-width); padding: 1.5rem 2rem; }
        
        .nav-pills .nav-link { 
            color: #636e72; padding: 10px 15px; 
            border-radius: 12px; margin-bottom: 5px; font-weight: 600;
            font-size: 0.8rem; transition: 0.2s;
        }

        .nav-pills .nav-link.active { 
            background: var(--brand-gradient); color: white; 
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.15);
        }

        /* Card Padat */
        .glass-card { 
            background: white; border-radius: 20px; 
            padding: 1.5rem; border: 1px solid #f1f5f9;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        /* Modern Table (Proporsional) */
        .modern-table thead th {
            font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px;
            font-weight: 800; color: #94a3b8; padding: 10px 15px; border: none;
        }

        .modern-table td { 
            padding: 12px 15px; background: #ffffff; 
            vertical-align: middle; border-bottom: 1px solid #f8fafc;
        }

        /* Header Utility */
        .search-box {
            background: white; border: 1px solid #eee; border-radius: 10px;
            padding: 6px 15px; font-size: 0.8rem; outline: none; transition: 0.3s;
        }
        .search-box:focus { border-color: #198754; box-shadow: 0 0 0 3px rgba(25,135,84,0.05); }

        .badge-prodi {
            background: #f0fdf4; color: #166534;
            border: 1px solid #dcfce7; padding: 4px 10px;
            border-radius: 8px; font-weight: 700; font-size: 0.65rem;
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
            <h6 class="fw-800 mb-0" style="letter-spacing: -0.5px;">SIMPATIK.</h6>
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
            <h4 class="fw-800 mb-0">Database Mahasiswa</h4>
            <p class="text-muted small mb-0">Total {{ $mahasiswa_list->count() }} mahasiswa terdaftar.</p>
        </div>
        <div class="d-flex gap-2">
            <input type="text" class="search-box" style="width: 220px;" placeholder="Cari nama atau NIM...">
        </div>
    </header>

    <div class="glass-card">
        <div class="table-responsive">
            <table class="table modern-table w-100 mb-0">
                <thead>
                    <tr>
                        <th class="ps-3">Identitas Mahasiswa</th>
                        <th>Nomor Induk (NIM)</th>
                        <th>Program Studi</th>
                        <th class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswa_list as $mhs)
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($mhs->nama_mahasiswa) }}&background=0f5132&color=fff" 
                                     class="rounded-circle me-3" width="32" height="32">
                                <div>
                                    <div class="fw-bold text-dark">{{ $mhs->nama_mahasiswa }}</div>
                                    <small class="text-muted" style="font-size: 10px;">Terdaftar: {{ date('d/m/Y') }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <code class="text-success fw-bold" style="background: #f0fdf4; padding: 3px 8px; border-radius: 6px; font-size: 0.75rem;">
                                {{ $mhs->nim }}
                            </code>
                        </td>
                        <td>
                            <span class="badge-prodi">
                                {{ $mhs->program_studi }}
                            </span>
                        </td>
                        <td class="text-end pe-3">
                            <button class="btn btn-light btn-sm rounded-pill px-3 fw-bold shadow-sm" style="font-size: 10px;">
                                <i class="fa-solid fa-eye me-1"></i> Detail
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <i class="fa-solid fa-folder-open fs-2 mb-2 text-muted opacity-25"></i>
                            <p class="text-muted small mb-0">Belum ada data mahasiswa yang terekam.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>