<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengajuan KP - SIMPATIK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling untuk navbar agar sesuai dengan gambar yang diunggah */
        .navbar {
            background-color: #0f5132; /* Warna hijau yang lebih terang sesuai gambar */
        }
        .navbar-brand {
            color: white !important; /* Teks navbar berwarna putih */
            font-weight: bold;
            padding-left: 20px; /* Menambahkan padding kiri untuk memberi jarak dengan tepi */
        }
        .navbar-nav .nav-link {
            color: white !important; /* Teks link navbar berwarna putih */
        }
        .navbar-nav .nav-link:hover {
            color: #ddd !important; /* Efek hover untuk link navbar */
        }

        /* Memastikan navbar berada di tengah */
        .navbar-collapse {
            justify-content: center; /* Menyusun navbar item di tengah */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">SIMPATIK - Admin</a>
</nav>

<div class="container mt-5">
    <h3>Data Pengajuan Kerja Praktik</h3>

    <!-- Tampilkan jika ada pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Instansi Tujuan</th>
                <th>Alamat Instansi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama_mahasiswa }}</td>
                    <td>{{ $p->nim }}</td>
                    <td>{{ $p->program_studi }}</td>
                    <td>{{ $p->instansi_tujuan }}</td>
                    <td>{{ $p->alamat_instansi }}</td>
                    <td>{{ $p->tanggal_mulai }}</td>
                    <td>{{ $p->tanggal_selesai }}</td>
                    <td>
                        <span class="badge bg-{{ $p->status == 'menunggu' ? 'warning' : ($p->status == 'disetujui' ? 'success' : 'danger') }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td>
                        @if($p->status == 'menunggu')
                            <form action="{{ route('admin.pengajuan.approve', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            <form action="{{ route('admin.pengajuan.reject', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @else
                            <span class="text-muted">Tidak bisa diubah</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Menambahkan Bootstrap JS dan dependensinya -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>