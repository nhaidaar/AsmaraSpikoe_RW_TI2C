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
                'warga_id'              => 1,
                'pendapatan'            => 5000000,
                'luas_rumah'            => 20,
                'jumlah_tanggungan'     => 3,
                'tanggungan_pendidikan' => 1000000,
                'pbb'                   => 25000,
                'tagihan_listrik'       => 100000,
                'tagihan_air'           => 50000,
                'jumlah_kendaraan'      => 3,
                'bpjs'                  => 'Kelas 2'
            ],
            [
                'warga_id'              => 2,
                'pendapatan'            => 2500000,
                'luas_rumah'            => 15,
                'jumlah_tanggungan'     => 2,
                'tanggungan_pendidikan' => 5000000,
                'pbb'                   => 20000,
                'tagihan_listrik'       => 75000,
                'tagihan_air'           => 50000,
                'jumlah_kendaraan'      => 1,
                'bpjs'                  => 'Kelas 3'
            ]
        ];
        
        DB::table('detail_warga')->insert($data);
    }
}
