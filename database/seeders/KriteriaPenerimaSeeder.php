<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaPenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 101; $i++) {
            DB::table('kriteria_penerima')->insert([
                'pendaftar_id' => $i,
                'kb_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
