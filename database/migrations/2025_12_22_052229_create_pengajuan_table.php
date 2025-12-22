<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            
            // Data Mahasiswa
            $table->string('nama_mahasiswa');
            $table->string('nim', 20);
            $table->string('program_studi');

            // Data KP
            $table->string('instansi_tujuan');
            $table->text('alamat_instansi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            // File
            $table->string('surat_pengantar')->nullable();

            // Status Pengajuan
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])
                  ->default('menunggu');

            // Catatan admin (opsional)
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
