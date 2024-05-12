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
        Schema::create('surat', function (Blueprint $table) {
            $table->uuid('surat_id')->primary();
            $table->unsignedBigInteger('surat_pengaju')->index();
            $table->enum('surat_jenis', ['Surat Pengantar', 'Surat Pernyataan Tidak Mampu']);
            $table->enum('surat_tujuan', [
                'Administrasi Kependudukan',
                'Pengajuan Bantuan Sosial',
                'Permohonan Administratif RT',
                'Permohonan Layanan Kesehatan'
            ]);
            $table->dateTime('surat_tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
