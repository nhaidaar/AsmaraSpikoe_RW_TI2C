<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $rt = 1;
        for ($i = 0; $i < 42; $i++) {
            DB::table('kartu_keluarga')->insert([
                'no_kk' => $faker->nik(),
                'rt'    => $rt,
            ]);

            $rt++;
            if ($rt == 8) {
                $rt = 1;
            }
        }
    }
}
