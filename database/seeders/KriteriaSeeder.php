<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kriteria_nama' => 'C1',
            ],
            [
                'kriteria_nama' => 'C2',
            ],
            [
                'kriteria_nama' => 'C3',
            ],
        ];
        
        DB::table('kriteria')->insert($data);
    }
}
