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
        Schema::create('detail_warga', function (Blueprint $table) {
            $table->id('detail_warga_id');
            $table->unsignedBigInteger('warga_id')->index();
            $table->double('pendapatan');
            $table->double('luas_rumah');
            $table->unsignedInteger('jumlah_tanggungan');
            $table->double('tangunggan_pendidikan');
            $table->double('pbb');
            $table->double('tagihan_listrik');
            $table->double('tagihan_air');
            $table->unsignedInteger('jumlah_kendaraan');
            $table->enum('bpjs', [
                'Kelas 1',
                'Kelas 2',
                'Kelas 3',
                'Tidak ada'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_warga');
    }
};
