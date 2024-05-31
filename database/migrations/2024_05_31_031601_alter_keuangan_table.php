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
        Schema::table('keuangan', function (Blueprint $table) {
            $table->unsignedBigInteger('rt_id')->index()->after('keuangan_id');
        });
        
        Schema::table('keuangan', function (Blueprint $table) {
            $table->foreign('rt_id')->references('rt_id')->on('rukun_tetangga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keuangan', function (Blueprint $table) {
            $table->dropColumn('rt_id');
        });
    }
};
