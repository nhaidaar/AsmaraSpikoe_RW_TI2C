<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'bansos_id' => 1, 
                'bansos_kriteria' => 'Sebatang kara',
            ],
            [
                'bansos_id' => 1, 
                'bansos_kriteria' => 'Berpenghasilan Rendah',
            ],
            [
                'bansos_id' => 2, 
                'bansos_kriteria' => 'Memiliki Kartu Keluarga Sejahtera (KKS)',
            ],
        ];
        DB::table('kriteria_bansos')->insert($data);
    }
}
