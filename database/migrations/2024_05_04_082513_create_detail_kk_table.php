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
            $table->id('detail_kk_id');
            $table->unsignedBigInteger('kk_id')->index();
            $table->unsignedBigInteger('warga_id')->index();
            $table->unsignedBigInteger('hubungan_id')->index();
            $table->timestamps();
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
