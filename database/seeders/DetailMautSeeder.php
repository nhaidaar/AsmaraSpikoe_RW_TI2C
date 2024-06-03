<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailMautSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'maut_id'       => 1, 
                'kriteria_id'   => 1,
                'kriteria_skor' => 20
            ],
            [
                'maut_id'       => 2, 
                'kriteria_id'   => 2,
                'kriteria_skor' => 20
            ],
        ];

        DB::table('detail_maut')->insert($data);
    }
}
