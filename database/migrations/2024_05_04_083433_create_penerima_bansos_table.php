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
            $table->id('pb_id');
            $table->unsignedBigInteger('penerima_bansos')->index();
            $table->unsignedBigInteger('bansos_id')->index();
            $table->timestamps();

            $table->foreign('penerima_bansos')->references('kp_id')->on('kriteria_penerima');
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
