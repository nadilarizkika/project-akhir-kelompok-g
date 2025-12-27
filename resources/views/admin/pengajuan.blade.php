<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengajuan - SIMPATIK</title>
    
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

        /* Sidebar Konsisten */
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
            border-radius: 12px; margin-bottom: 5px; font-size: 0.8rem;
        }

        .nav-pills .nav-link.active {
            background: var(--brand-gradient); color: white;
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.15);
        }

        #main-wrapper { margin-left: var(--sidebar-width); padding: 1.5rem 2rem; }

        .glass-card {
            background: white; border-radius: 20px; padding: 1.2rem;
            border: 1px solid #f1f5f9; box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        /* Modern Table Styling */
        .modern-table thead th {
            font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px;
            font-weight: 800; color: #94a3b8; padding: 10px 15px; border: none;
        }

        .modern-table td {
            padding: 12px 15px; vertical-align: middle; border-bottom: 1px solid #f8fafc;
        }

        .badge-status {
            padding: 4px 10px; font-weight: 700; font-size: 0.65rem; border-radius: 6px;
        }

        /* PERBAIKAN: Tombol Tindakan Berwarna */
        .btn-action {
            width: 32px; height: 32px; display: inline-flex;
            align-items: center; justify-content: center; border-radius: 10px;
            font-size: 0.8rem; border: none; transition: 0.2s; color: white !important;
        }

        .btn-success-action { background-color: #198754 !important; }
        .btn-success-action:hover { background-color: #146c43 !important; transform: translateY(-2px); }

        .btn-danger-action { background-color: #dc3545 !important; }
        .btn-danger-action:hover { background-color: #bb2d3b !important; transform: translateY(-2px); }

        .btn-logout {
            background: #fff; color: #dc3545; border: 1px solid #fee2e2;
            padding: 8px; border-radius: 10px; font-weight: 700; font-size: 0.75rem;
        }

        .search-box {
            background: white; border: 1px solid #eee; border-radius: 10px;
            padding: 6px 15px; font-size: 0.8rem; outline: none;
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
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-chart-pie me-2"></i> Ringkasan</a>
        <a href="{{ route('admin.pengajuan') }}" class="nav-link {{ request()->routeIs('admin.pengajuan') ? 'active' : '' }}"><i class="fa-solid fa-paper-plane me-2"></i> Pengajuan</a>
        <a href="{{ route('admin.mahasiswa') }}" class="nav-link {{ request()->routeIs('admin.mahasiswa') ? 'active' : '' }}"><i class="fa-solid fa-user-graduate me-2"></i> Mahasiswa</a>
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
            <h4 class="fw-800 mb-0">Manajemen Pengajuan</h4>
            <p class="text-muted small mb-0">Verifikasi berkas mahasiswa secara real-time</p>
        </div>
        <a href="{{ route('admin.pengajuan.export') }}"
        class="btn btn-success btn-sm rounded-pill px-3 fw-bold shadow-sm">
        <i class="fa-solid fa-file-export me-1"></i> Ekspor Data </a>
    </header>

    <div class="d-flex gap-2 mb-3">
        <select class="search-box"><option>Semua Status</option></select>
        <input type="text" class="search-box" style="width: 250px;" placeholder="Cari nama atau NIM...">
    </div>

    <div class="glass-card">
        <div class="table-responsive">
            <table class="table modern-table mb-0">
                <thead>
                    <tr>
                        <th class="ps-3">Mahasiswa</th>
                        <th>Instansi</th>
                        <th class="text-center">Dokumen</th>
                        <th class="text-center">Status</th>
                        <th class="text-end pe-3">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($semua_pengajuan as $item)
                    <tr>
                        <td class="ps-3">
                            <div class="fw-bold text-dark">{{ $item->nama_mahasiswa }}</div>
                            <small class="text-muted" style="font-size: 10px;">{{ $item->nim }}</small>
                        </td>
                        <td>
                            <div class="small fw-semibold text-dark">{{ $item->instansi_tujuan }}</div>
                            <small class="text-muted d-block text-truncate" style="max-width: 150px;">{{ $item->alamat_instansi }}</small>
                        </td>
                        <td class="text-center">
                            <a href="{{ asset('storage/' . $item->surat_pengantar) }}" target="_blank" class="btn btn-light btn-sm rounded-pill border px-3 py-1 shadow-sm" style="font-size: 9px;">
                                <i class="fa-solid fa-file-pdf text-danger me-1"></i> VIEW
                            </a>
                        </td>
                        <td class="text-center">
                            <span class="badge-status 
                                {{ $item->status == 'menunggu' ? 'bg-warning-subtle text-warning' : ($item->status == 'disetujui' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger') }}">
                                {{ strtoupper($item->status) }}
                            </span>
                        </td>
                        <td class="text-end pe-3">
                            @if ($item->status === 'menunggu')
                            <div class="d-flex gap-2 justify-content-end">
                                <button onclick="updateStatus({{ $item->id }}, 'disetujui')"
                                    class="btn-action btn-success-action shadow-sm"
                                    title="Setujui">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                                
                                <button onclick="updateStatus({{ $item->id }}, 'ditolak')"
                                    class="btn-action btn-danger-action shadow-sm"
                                    title="Tolak">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            
                            @else
                            <!-- STATUS FINAL → TIDAK ADA AKSI -->
                            <span class="text-muted small fst-italic">
                                Sudah diproses
                            </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted small">Belum ada pengajuan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function updateStatus(id, status) {

    // =========================
    // JIKA DITOLAK
    // =========================
    if (status === 'ditolak') {
        Swal.fire({
            title: 'Alasan Penolakan',
            input: 'textarea',
            inputPlaceholder: 'Berikan alasan agar mahasiswa dapat memperbaikinya...',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Kirim Penolakan',
            cancelButtonText: 'Batal',
            inputValidator: (value) => {
                if (!value) {
                    return 'Alasan penolakan tidak boleh kosong!'
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                processUpdate(id, status, result.value, null);
            }
        });

    // =========================
    // JIKA DISETUJUI
    // =========================
    } else if (status === 'disetujui') {
        Swal.fire({
            title: 'Setujui Pengajuan KP',
            html: `
                <p class="mb-2">Upload <b>Surat Balasan / Persetujuan</b> (PDF)</p>
                <input type="file" id="suratBalasan" class="swal2-input" accept=".pdf">
                <small style="font-size:11px;color:#666">Wajib PDF • Maks 2MB</small>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            confirmButtonText: 'Ya, Setujui',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                const file = document.getElementById('suratBalasan').files[0];
                if (!file) {
                    Swal.showValidationMessage('Surat balasan wajib diupload!');
                }
                return file;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                processUpdate(id, status, null, result.value);
            }
        });
    }
}

/**
 * =========================
 * AJAX UPDATE STATUS
 * =========================
 */
function processUpdate(id, status, catatan, suratBalasan) {

    let formData = new FormData();
    formData.append('_token', "{{ csrf_token() }}");
    formData.append('status', status);

    if (catatan) {
        formData.append('catatan', catatan);
    }

    if (suratBalasan) {
        formData.append('surat_balasan', suratBalasan);
    }

    $.ajax({
        url: `/admin/pengajuan/${id}/update-status`,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: response.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            }
        },
        error: function() {
            Swal.fire(
                'Gagal!',
                'Gagal memperbarui status. Pastikan file PDF valid & route benar.',
                'error'
            );
        }
    });
}
</script>


</body>
</html>