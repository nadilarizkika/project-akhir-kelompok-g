<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pengajuan_kps', function (Blueprint $table) {
        $table->id();
        $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
        $table->string('instansi');
        $table->text('alamat_instansi');
        $table->date('tgl_mulai');
        $table->date('tgl_selesai');
        $table->string('surat_pengantar');
        $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_k_p_s');
    }
};
