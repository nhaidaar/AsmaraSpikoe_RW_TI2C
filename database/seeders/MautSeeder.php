<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MautSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'warga_id'      => 1, 
                'skor_akhir'    => 100, 
            ],
            [
                'warga_id'      => 2, 
                'skor_akhir'    => 90, 
            ],
        ];

        DB::table('maut')->insert($data);
    }
}
