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
        Schema::create('penerima_bansos', function (Blueprint $table) {
            $table->id('penerima_id');
            $table->unsignedBigInteger('warga_id')->index();
            $table->unsignedBigInteger('bansos_id')->index();
            $table->integer('periode_bulan');
            $table->year('periode_tahun');
            $table->timestamps();

            $table->foreign('warga_id')->references('warga_id')->on('warga');
            $table->foreign('bansos_id')->references('bansos_id')->on('bansos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bansos');
    }
};
