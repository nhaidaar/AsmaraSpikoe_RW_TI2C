<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pengumuman_id'     => 1,
                'pengumuman_nama'   => 'Pemadaman Listrik',
                'pengumuman_lokasi' => 'RT 2 sampai RT 4',
                'tanggal_waktu'     => now(),
                'user_id'           => 1,
            ],
            [
                'pengumuman_id'     => 2,
                'pengumuman_nama'   => 'Pemadaman Air',
                'pengumuman_lokasi' => 'RT 3',
                'tanggal_waktu'     => now(),
                'user_id'           => 2,
            ],
            [
                'pengumuman_id'     => 3,
                'pengumuman_nama'   => 'Pengaspalan jalan',
                'pengumuman_lokasi' => 'RT 5',
                'tanggal_waktu'     => now(),
                'user_id'           => 3,
            ],
        ];
        DB::table('pengumuman')->insert($data);
    }
}
