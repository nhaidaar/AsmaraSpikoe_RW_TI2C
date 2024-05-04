<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaPenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pendaftar_id' => 1, 
                'kb_id' => 1, 
            ],
            [
                'pendaftar_id' => 1, 
                'kb_id' => 2, 
            ],
            [
                'pendaftar_id' => 2, 
                'kb_id' => 3, 
            ],
        ];
        DB::table('kriteria_penerima')->insert($data);
    }
}
