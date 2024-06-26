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
        Schema::create('rukun_tetangga', function (Blueprint $table) {
            $table->id('rt_id');
            $table->unsignedBigInteger('ketua_rt')->index();
            $table->string('no_telepon', 14);
            $table->timestamps();

            $table->foreign('ketua_rt')->references('warga_id')->on('warga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rukun_tetangga');
    }
};
