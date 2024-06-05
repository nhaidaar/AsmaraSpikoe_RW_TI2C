<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerimaBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'warga_id'  => 1,
                'bansos_id' => 1,
                'periode_bulan'   => now()->month,
                'periode_tahun'   => now()->year
            ],
            [
                'warga_id'  => 2,
                'bansos_id' => 3,
                'periode_bulan'   => now()->month,
                'periode_tahun'   => now()->year
            ],
        ];

        DB::table('penerima_bansos')->insert($data);
    }
}
