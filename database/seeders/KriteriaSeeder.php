<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'pendapatan' => 'Pendapatan per Bulan',
            'jumlah_kendaraan' => 'Jumlah Kendaraan',
            'bpjs' => 'BPJS',
            'luas_rumah' => 'Luas Bangunan',
            'jumlah_tanggungan' => 'Jumlah Tanggungan',
            'pbb' => 'Pajak Bumi dan Bangunan',
            'tagihan_listrik' => 'Tagihan Listrik',
            'tagihan_air' => 'Tagihan Air',
            'tanggungan_pendidikan' => 'Tanggungan Pendidikan'
        ];

        foreach ($data as $key => $value) {
            DB::table('kriteria')->insert([
                'kriteria_nama' => $key,
                'keterangan' => $value,
            ]);
        }
    }
}
