<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 210; $i++) {
            DB::table('surat')->insert([
                'surat_id' => Str::uuid(),
                'surat_pengaju' => $i,
                'surat_jenis' => $faker->randomElement(['Surat Pengantar', 'Surat Pernyataan Tidak Mampu']),
                'surat_tujuan' => $faker->randomElement([
                    'Administrasi Kependudukan',
                    'Pengajuan Bantuan Sosial',
                    'Permohonan Administratif RT',
                    'Permohonan Layanan Kesehatan'
                ]),
                'surat_tanggal' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
