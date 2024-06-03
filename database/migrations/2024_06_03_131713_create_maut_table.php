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
        
        Schema::create('maut', function (Blueprint $table) {
            $table->id('maut_id');
            $table->unsignedBigInteger('warga_id')->index();
            $table->double('skor_akhir');
            $table->timestamps();

            $table->foreign('warga_id')->references('warga_id')->on('warga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maut');
    }
};
