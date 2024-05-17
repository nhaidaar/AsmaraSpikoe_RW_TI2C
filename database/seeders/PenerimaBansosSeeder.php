<?php

namespace Database\Seeders;

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
                'penerima_bansos' => 1, 
                'bansos_id' => 1, 
            ],
            [
                'penerima_bansos' => 1, 
                'bansos_id' => 2, 
            ],
            [
                'penerima_bansos' => 2, 
                'bansos_id' => 3, 
            ],
        ];
        
        DB::table('penerima_bansos')->insert($data);
    }
}
