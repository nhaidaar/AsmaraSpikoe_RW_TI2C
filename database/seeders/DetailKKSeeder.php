<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailKKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kk = 1;
        for ($i = 1; $i < 31; $i++) {
            DB::table('detail_kk')->insert([
                'kk_id' => $kk,
                'warga_id' => $i,
                'hubungan_id' => 1,
            ]);

            $kk++;
        }

        $kk = 1;
        for ($i = 31; $i < 61; $i++) {
            DB::table('detail_kk')->insert([
                'kk_id' => $kk,
                'warga_id' => $i,
                'hubungan_id' => 2,
            ]);

            $kk++;
        }

        for ($i = 61; $i < 101; $i++) {
            DB::table('detail_kk')->insert([
                'kk_id' => $faker->numberBetween(1, 30),
                'warga_id' => $i,
                'hubungan_id' => 3,
            ]);
        }
    }
}
