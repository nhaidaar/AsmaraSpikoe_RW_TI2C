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
            $table->string('surat_pengaju', 16)->unique();
            $table->enum('surat_jenis', ['Surat Pengantar', 'Surat Pernyataan Tidak Mampu']);
            $table->enum('surat_tujuan', [
                'Administrasi Kependudukan', 'Pengajuan Bantuan Sosial', 'Permohonan Administratif RT', 'Permohonan Layanan Kesehatan'
            ]);
            $table->dateTime('surat_taggal');
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
