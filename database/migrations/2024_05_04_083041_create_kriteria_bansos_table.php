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
        Schema::create('kriteria_bansos', function (Blueprint $table) {
            $table->id('kb_id');
            $table->unsignedBigInteger('bansos_id')->index();
            $table->string('bansos_kriteria');
            $table->timestamps();

            $table->foreign('bansos_id')->references('bansos_id')->on('bansos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_bansos');
    }
};
