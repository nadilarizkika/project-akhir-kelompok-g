<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan — SIMPATIK</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-emerald: #10b981;
            --dark-emerald: #064e3b;
            --accent-pink: #f472b6;
            --soft-bg: #f8fafc;
        }

        body { 
            background-color: var(--soft-bg); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: #1e293b;
        }

        /* Header Section */
        .page-header {
            background: linear-gradient(135deg, var(--dark-emerald), var(--primary-emerald));
            padding: 60px 0 100px;
            color: white;
            border-radius: 0 0 40px 40px;
        }

        .header-title {
            font-weight: 800;
            letter-spacing: 1px;
        }

        /* Main Card Container */
        .history-card { 
            background: white; 
            border-radius: 30px; 
            padding: 40px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.04); 
            border: 1px solid rgba(255,255,255,0.8);
            margin-top: -60px; /* Overlap effect */
        }

        /* Status Pill Custom */
        .status-pill {
            padding: 6px 14px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-width: 1.5px !important;
        }

        /* Modern Table Row */
        .table thead th {
            border: none;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
            padding-bottom: 20px;
        }

        .table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #fdf2f8; /* Soft pink on hover */
            transform: scale(1.005);
        }

        .instansi-name {
            font-weight: 700;
            color: var(--dark-emerald);
            font-size: 1rem;
        }

        /* Action Button */
        .btn-action-unduh {
            background-color: var(--dark-emerald);
            color: white;
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 10px 20px;
            transition: 0.3s;
            border: none;
        }

        .btn-action-unduh:hover {
            background-color: var(--accent-pink);
            color: white;
            box-shadow: 0 10px 20px rgba(244, 114, 182, 0.3);
            transform: translateY(-2px);
        }

        .empty-state img {
            filter: grayscale(1) opacity(0.2);
            margin-bottom: 20px;
        }

        .back-nav {
            color: white;
            text-decoration: none;
            font-weight: 600;
            opacity: 0.8;
            transition: 0.3s;
        }

        .back-nav:hover {
            opacity: 1;
            color: var(--accent-pink);
        }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('mahasiswa.dashboard') }}" class="back-nav">
                <i class="fa-solid fa-chevron-left me-2"></i>Dashboard
            </a>
            <span class="badge rounded-pill bg-white text-dark px-3 py-2 fw-bold small shadow-sm">
                NIM: {{ $nim }}
            </span>
        </div>
        <h2 class="header-title text-center">RIWAYAT PENGAJUAN</h2>
        <p class="text-center opacity-75">Pantau dan unduh berkas administrasi Kerja Praktik Anda</p>
    </div>
</div>

<div class="container">
    <div class="history-card">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h5 class="fw-800 mb-0">Daftar Berkas</h5>
            <div class="text-muted small">Total: {{ count($pengajuan) }} Pengajuan</div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Tujuan & Tanggal</th>
                        <th class="text-center">Status</th>
                        <th>Keterangan Admin</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuan as $item)
                    <tr>
                        <td>
                            <div class="instansi-name">{{ $item->instansi_tujuan }}</div>
                            <div class="small text-muted">
                                <i class="fa-regular fa-calendar-check me-1"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </div>
                        </td>
                        <td class="text-center">
                            @if($item->status == 'disetujui')
                                <span class="badge status-pill bg-success-subtle text-success border border-success">
                                    <i class="fa-solid fa-check-circle me-1"></i>Selesai
                                </span>
                            @elseif($item->status == 'ditolak')
                                <span class="badge status-pill bg-danger-subtle text-danger border border-danger">
                                    <i class="fa-solid fa-circle-xmark me-1"></i>Ditolak
                                </span>
                            @else
                                <span class="badge status-pill bg-warning-subtle text-warning border border-warning">
                                    <i class="fa-solid fa-clock me-1"></i>Proses
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="small text-secondary" style="max-width: 250px; line-height: 1.4;">
                                {{ $item->catatan_admin ?? 'Menunggu tinjauan admin...' }}
                            </div>
                        </td>
                        <td class="text-end">
                            @if($item->status == 'disetujui' && $item->file_balasan)
                                <a href="{{ asset('storage/' . $item->file_balasan) }}" class="btn btn-action-unduh">
                                    <i class="fa-solid fa-download me-2"></i>UNDUH PDF
                                </a>
                            @elseif($item->status == 'ditolak')
                                <span class="badge bg-light text-muted fw-bold">N/A</span>
                            @else
                                <span class="small text-muted italic opacity-50">Sedang Review</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 empty-state">
                            <i class="fa-solid fa-folder-open fa-4x text-muted mb-3 d-block opacity-25"></i>
                            <h6 class="fw-bold text-muted">Belum Ada Riwayat</h6>
                            <p class="text-muted small">Silakan buat pengajuan pertama Anda di menu Dashboard.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-center mt-5 mb-4">
        <p class="text-muted small">
            &copy; 2025 <strong>SIMPATIK</strong> &bull; Sistem Informasi Pengajuan Kerja Praktik
        </p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>