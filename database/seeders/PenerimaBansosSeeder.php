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
                'periode'   => now()
            ],
            [
                'warga_id'  => 2, 
                'bansos_id' => 3,
                'periode'   => now()
            ],
        ];
        
        DB::table('penerima_bansos')->insert($data);
    }
}
