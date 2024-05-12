<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no_kk' => '1234567890123456',
                'rt' => 1, 
            ],
            [
                'no_kk' => '1234567890123457',
                'rt' => 2, 
            ],
        ];
        DB::table('kartu_keluarga')->insert($data);
    }
}