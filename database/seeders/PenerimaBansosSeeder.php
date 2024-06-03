<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerimaBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 91; $i++) {
            DB::table('penerima_bansos')->insert([
                'penerima_bansos' => $i,
                'bansos_id' => $faker->numberBetween(1, 3)
            ]);
        }
    }
}
