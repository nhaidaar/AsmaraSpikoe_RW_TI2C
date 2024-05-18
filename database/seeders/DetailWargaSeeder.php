<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'warga_id' => 1,
                'pendapatan' => 5000000.00,
                'luas_rumah' => 100.50,
                'jumlah_tanggungan' => 3,
                'tanggungan_pendidikan' => 1500000.00,
                'pbb' => 500000.00,
                'tagihan_listrik' => 300000.00,
                'tagihan_air' => 200000.00,
                'jumlah_kendaraan' => 2,
                'bpjs' => 'Kelas 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'warga_id' => 2,
                'pendapatan' => 7000000.00,
                'luas_rumah' => 120.75,
                'jumlah_tanggungan' => 4,
                'tanggungan_pendidikan' => 2000000.00,
                'pbb' => 600000.00,
                'tagihan_listrik' => 350000.00,
                'tagihan_air' => 250000.00,
                'jumlah_kendaraan' => 1,
                'bpjs' => 'Kelas 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('detail_warga')->insert($data);
    }
}
