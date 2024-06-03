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
        Schema::create('detail_maut', function (Blueprint $table) {
            $table->id('detail_maut_id');
            $table->unsignedBigInteger('maut_id')->index();
            $table->unsignedBigInteger('kriteria_id')->index();
            $table->double('kriteria_skor');
            $table->timestamps();

            $table->foreign('maut_id')->references('maut_id')->on('maut');
            $table->foreign('kriteria_id')->references('kriteria_id')->on('kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_maut');
    }
};
