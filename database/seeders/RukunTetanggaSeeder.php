<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RukunTetanggaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 8; $i++) {
            DB::table('rukun_tetangga')->insert([
                'ketua_rt' => $faker->numberBetween(1, 20),
                'no_telepon' => $faker->numerify('08##########'),
            ]);
        }
    }
}
