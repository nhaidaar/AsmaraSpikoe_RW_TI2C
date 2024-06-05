<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'kegiatan_id' => 1,
                'kegiatan_nama' => 'Lomba Peringatan 17 Agustus',
                'kegiatan_lokasi' => 'Lapangan SMP 3',
                'tanggal_waktu' => now(),
                'user_id' => 1,
            ],
            [
                'kegiatan_id' => 2,
                'kegiatan_nama' => 'Pengajian Akbar',
                'kegiatan_lokasi' => 'Lapangan RT 5',
                'tanggal_waktu' => now(),
                'user_id' => 2,
            ],
            [
                'kegiatan_id' => 3,
                'kegiatan_nama' => 'Pertunjukan Dangdut',
                'kegiatan_lokasi' => 'Lapangan RT 4',
                'tanggal_waktu' => now(),
                'user_id' => 1,
            ],
        ];
        DB::table('kegiatan')->insert($data);
    }
}
