<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
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
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 210; $i++) {
            DB::table('detail_warga')->insert([
                'warga_id' => $i,
                'pendapatan' => $faker->randomElement([350000, 750000, 1300000, 1800000, 2250000, 3000000]),
                'luas_rumah' => $faker->randomElement([15, 25, 35, 45, 75]),
                'jumlah_tanggungan' => $faker->randomElement([1, 2, 3, 4, 5]),
                'tanggungan_pendidikan' => $faker->randomElement([1, 2, 3, 4, 5]),
                'pbb' => $faker->randomElement([75000, 150000, 250000]),
                'tagihan_listrik' => $faker->randomElement([75000, 150000, 250000, 350000, 500000]),
                'tagihan_air' => $faker->randomElement([50000, 75000, 100000, 150000, 180000, 210000]),
                'jumlah_kendaraan' => $faker->randomElement([1, 2, 3, 4, 5]),
                'bpjs' => $faker->randomElement(['Kelas 1', 'Kelas 2', 'Kelas 3', 'Tidak ada']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
