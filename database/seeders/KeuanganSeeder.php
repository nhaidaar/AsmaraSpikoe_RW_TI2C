<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = 
        [
            [
                'rt_id'                 => '1',
                'tanggal'               => now(),
                'jenis_keuangan'        => 'Pemasukkan',
                'nominal'               => 1000000,
                'keterangan_keuangan'   => 'Iuran Sampah'
            ],
            [
                'rt_id'                 => '1',
                'tanggal'               => now(),
                'jenis_keuangan'        => 'Pengeluaran',
                'nominal'               => 100000,
                'keterangan_keuangan'   => 'Pembelian Kain Kafan'
            ],
        ];

        DB::table('keuangan')->insert($data);
    }
}
