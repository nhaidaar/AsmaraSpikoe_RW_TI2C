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
        Schema::table('warga', function (Blueprint $table) {
            $table->foreign('no_kk')->references('no_kk')->on('kartu_keluarga');
        });

        Schema::table('rukun_tetangga', function (Blueprint $table) {
            $table->foreign('pengurus_rt')->references('nik')->on('warga');
        });

        Schema::table('kartu_keluarga', function (Blueprint $table) {
            $table->foreign('kepala_keluarga')->references('nik')->on('warga');
            $table->foreign('rt')->references('rt_id')->on('rukun_tetangga');
        });

        Schema::table('surat', function (Blueprint $table) {
            $table->foreign('surat_pengaju')->references('nik')->on('warga');
        });

        Schema::table('kriteria_bansos', function (Blueprint $table) {
            $table->foreign('bansos_id')->references('bansos_id')->on('bansos');
        });

        Schema::table('pendaftar_bansos', function (Blueprint $table) {
            $table->foreign('nik')->references('nik')->on('warga');
        });

        Schema::table('kriteria_penerima', function (Blueprint $table) {
            $table->foreign('pendaftar_id')->references('pendaftar_id')->on('pendaftar_bansos');
            $table->foreign('kb_id')->references('kb_id')->on('kriteria_bansos');
        });

        Schema::table('penerima_bansos', function (Blueprint $table) {
            $table->foreign('penerima_bansos')->references('pendaftar_id')->on('kriteria_penerima');
            $table->foreign('bansos_id')->references('bansos_id')->on('bansos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
