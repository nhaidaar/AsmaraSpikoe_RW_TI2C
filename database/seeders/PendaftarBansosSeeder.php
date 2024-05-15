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
                // 'warga_id' => '1', 
                'detail_warga_id' => '1',
            ],
            [
                // 'warga_id' => '2', 
                'detail_warga_id' => '2',
            ],
        ];

        DB::table('pendaftar_bansos')->insert($data);
    }
}
