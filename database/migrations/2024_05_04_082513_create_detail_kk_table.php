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
        Schema::create('detail_kk', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('kk_id')->index();
            $table->unsignedBigInteger('warga_id')->index();
            $table->unsignedBigInteger('status_hubungan')->index();
            $table->timestamps();

            $table->foreign('kk_id')->references('kk_id')->on('kartu_keluarga');
            $table->foreign('warga_id')->references('warga_id')->on('warga');
            $table->foreign('status_hubungan')->references('hubungan_id')->on('status_hubungan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kk');
    }
};
