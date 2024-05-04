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
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users');
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users');
        });

        Schema::table('warga', function (Blueprint $table) {
            $table->foreign('kk_id')->references('kk_id')->on('kartu_keluarga');
            $table->foreign('status_hubungan')->references('hubungan_id')->on('status_hubungan');
            $table->foreign('pekerjaan')->references('pekerjaan_id')->on('pekerjaan');
        });

        Schema::table('rukun_tetangga', function (Blueprint $table) {
            $table->foreign('ketua_rt')->references('warga_id')->on('warga');
        });

        Schema::table('kartu_keluarga', function (Blueprint $table) {
            $table->foreign('rt')->references('rt_id')->on('rukun_tetangga');
        });

        Schema::table('surat', function (Blueprint $table) {
            $table->foreign('surat_pengaju')->references('warga_id')->on('warga');
        });

        Schema::table('kriteria_bansos', function (Blueprint $table) {
            $table->foreign('bansos_id')->references('bansos_id')->on('bansos');
        });

        Schema::table('pendaftar_bansos', function (Blueprint $table) {
            $table->foreign('warga_id')->references('warga_id')->on('warga');

        });

        Schema::table('kriteria_penerima', function (Blueprint $table) {
            $table->foreign('pendaftar_id')->references('pendaftar_id')->on('pendaftar_bansos');
            $table->foreign('kb_id')->references('kb_id')->on('kriteria_bansos');
        });

        Schema::table('penerima_bansos', function (Blueprint $table) {
            $table->foreign('penerima_bansos')->references('kp_id')->on('kriteria_penerima');
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
