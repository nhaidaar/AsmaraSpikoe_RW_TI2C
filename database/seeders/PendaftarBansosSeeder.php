<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftarBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nik' => '2345678901234561', 
            ],
            [
                'nik' => '3456789012345712', 
            ],
            [
                'nik' => '5678901234571234', 
            ],
        ];
        DB::table('pendaftar_bansos')->insert($data);
    }
}
