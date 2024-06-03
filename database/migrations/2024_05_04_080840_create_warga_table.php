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
        Schema::create('warga', function (Blueprint $table) {
            $table->id('warga_id');
            $table->string('nik', 16)->unique();
            $table->string('nama_warga', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('alamat_ktp', 100);
            $table->string('alamat_domisili', 100);
            $table->enum('agama', [
                'Islam',
                'Kristen',
                'Katolik',
                'Hindu',
                'Buddha',
                'Khonghucu',
                'Lainnya'
            ]);
            $table->enum('status_perkawinan', [
                'Belum Kawin',
                'Kawin',
                'Cerai Hidup',
                'Cerai Mati'
            ]);
            $table->unsignedBigInteger('pekerjaan')->index();
            $table->timestamps();

            $table->foreign('pekerjaan')->references('pekerjaan_id')->on('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
