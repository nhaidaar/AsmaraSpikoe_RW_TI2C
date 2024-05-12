<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'bansos_nama' => 'Bantuan Langsung Tunai (BLT)',
            ],
            [
                'bansos_nama' => 'Program Keluarga Harapan (PKH)',
            ],
            [
                'bansos_nama' => 'Bantuan Sembako',
            ],
        ];
        
        DB::table('bansos')->insert($data);
    }
}
