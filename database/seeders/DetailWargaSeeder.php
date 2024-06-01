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

        for ($i = 1; $i < 101; $i++) {
            DB::table('detail_warga')->insert([
                'warga_id' => $i,
                'pendapatan' => $faker->randomFloat(2, 400000.00, 10000000.00),
                'luas_rumah' => $faker->randomFloat(2),
                'jumlah_tanggungan' => $faker->randomDigit(),
                'tanggungan_pendidikan' => $faker->randomFloat(2, 200000.00, 5000000.00),
                'pbb' => $faker->randomFloat(2, 100000.00, 1000000.00),
                'tagihan_listrik' => $faker->randomFloat(2, 100000.00, 1000000.00),
                'tagihan_air' => $faker->randomFloat(2, 100000.00, 1000000.00),
                'jumlah_kendaraan' => $faker->randomDigit(),
                'bpjs' => $faker->randomElement(['Kelas 1', 'Kelas 2', 'Kelas 3', 'Tidak ada']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
