<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengajuan KP — SIMPATIK UINSU</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Bricolage+Grotesque:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --brand-dark: #052214;
            --brand-primary: #0f5132;
            --brand-accent: #198754;
            --soft-bg: #f8faf9;
        }

        body { 
            background-color: var(--soft-bg); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            padding: 20px 0; /* Padding body dikurangi */
            color: #2d3436;
        }

        .form-container {
            max-width: 580px; /* Ukuran kontainer diperkecil dari 720px */
            margin: auto;
        }

        .form-card { 
            background: white; 
            border-radius: 16px; /* Radius sedikit dikurangi agar lebih proporsional */
            border: 1px solid rgba(0,0,0,0.05); 
            box-shadow: 0 10px 30px rgba(0,0,0,0.04);
            overflow: hidden;
        }

        .header-section {
            background: var(--brand-dark);
            padding: 20px; /* Padding header dikurangi */
            text-align: center;
            color: white;
        }

        .header-section h3 {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-weight: 800;
            margin-bottom: 2px;
            font-size: 1.25rem; /* Ukuran font judul diperkecil */
        }

        .form-body { 
            padding: 25px 35px; /* Padding body formulir dikurangi */
        }

        .form-label { 
            font-weight: 700; 
            font-size: 0.7rem; /* Font label diperkecil */
            color: var(--brand-dark);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control, .form-select { 
            border-radius: 8px; 
            padding: 8px 12px; /* Padding input dikurangi */
            border: 1px solid #e2e8f0; 
            font-size: 0.85rem; /* Font input diperkecil */
            transition: 0.3s;
        }

        .form-control:focus { 
            border-color: var(--brand-accent); 
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.08); 
        }

        .section-divider {
            border-top: 1px solid #f1f5f9;
            margin: 20px 0; /* Jarak antar bagian dikurangi */
            position: relative;
        }

        .section-label {
            position: absolute;
            top: -10px;
            left: 0;
            background: white;
            padding-right: 10px;
            font-size: 0.65rem; /* Font label divider diperkecil */
            font-weight: 800;
            color: var(--brand-accent);
            text-transform: uppercase;
        }

        .btn-submit { 
            background: var(--brand-primary); 
            color: white; 
            border-radius: 10px; 
            font-weight: 700; 
            padding: 10px; /* Padding tombol dikurangi */
            border: none;
            width: 100%;
            transition: 0.3s;
            font-size: 0.9rem; /* Font tombol diperkecil */
        }

        .btn-submit:hover { 
            background: var(--brand-dark); 
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(15, 81, 50, 0.15);
        }

        .upload-area {
            border: 2px dashed #e2e8f0;
            padding: 15px; /* Padding area upload dikurangi */
            border-radius: 10px;
            text-align: center;
            background: #fcfdfe;
        }

        .text-xs { font-size: 0.7rem; } /* Font instruksi diperkecil */
    </style>
</head>
<body>

<div class="container form-container">
    <div class="form-card">
        <div class="header-section">
            <h3>Pengajuan Kerja Praktik</h3>
            <p class="small mb-0 opacity-75 text-xs">SIMPATIK — UIN Sumatera Utara</p>
        </div>

        <div class="form-body">
            @if ($errors->any())
                <div class="alert alert-danger border-0 rounded-3 mb-3 p-2">
                    <ul class="mb-0 text-xs fw-bold">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="section-divider">
                    <span class="section-label">Identitas Mahasiswa</span>
                </div>
                
                <div class="mb-2">
                    <label class="form-label">Nama Mahasiswa</label>
                    <input type="text" name="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa') }}" placeholder="Nama lengkap" required>
                </div>

                <div class="row g-2 mb-2">
                    <div class="col-md-6">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" placeholder="NIM" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Program Studi</label>
                        <select name="program_studi" class="form-select" required>
                            <option value="" disabled selected>Pilih Jurusan</option>
                            <option value="Sistem Informasi" {{ old('program_studi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                            <option value="Ilmu Komputer" {{ old('program_studi') == 'Ilmu Komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
                            <option value="Matematika" {{ old('program_studi') == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                        </select>
                    </div>
                </div>

                <div class="section-divider">
                    <span class="section-label">Detail Instansi</span>
                </div>

                <div class="mb-2">
                    <label class="form-label">Instansi Tujuan</label>
                    <input type="text" name="instansi_tujuan" class="form-control" value="{{ old('instansi_tujuan') }}" placeholder="Nama Instansi" required>
                </div>

                <div class="mb-2">
                    <label class="form-label">Alamat Instansi</label>
                    <textarea name="alamat_instansi" class="form-control" rows="2" placeholder="Alamat lengkap" required>{{ old('alamat_instansi') }}</textarea>
                </div>

                <div class="row g-2 mb-2">
                    <div class="col-md-6">
                        <label class="form-label">Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tgl_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tgl_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
                    </div>
                </div>

                <div class="section-divider">
                    <span class="section-label">Dokumen</span>
                </div>

                <div class="upload-area mb-3">
                    <label class="form-label d-block mb-1">Proposal / Surat Pengantar (PDF)</label>
                    <input type="file" name="surat_pengantar" class="form-control shadow-none" accept=".pdf" required>
                    <p class="text-xs text-muted mt-1 mb-0">Wajib .PDF | Maks: 2MB</p>
                </div>

                <button type="submit" class="btn btn-submit">
                    Kirim Pengajuan <i class="fa-solid fa-paper-plane ms-1"></i>
                </button>
                
                <div class="text-center mt-2">
                    <a href="/" class="text-decoration-none text-muted text-xs fw-bold">
                        <i class="fa-solid fa-arrow-left me-1"></i> Beranda
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const tglMulai = document.getElementById('tgl_mulai');
    const tglSelesai = document.getElementById('tgl_selesai');
    tglMulai.addEventListener('change', function() {
        tglSelesai.min = this.value;
    });
</script>
</body>
</html>