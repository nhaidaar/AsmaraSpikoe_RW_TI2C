<?php

namespace Database\Seeders;

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
        $data = [
            [
                'kk_id' => 1,
                'warga_id' => 1,
                'status_hubungan' => 1,
            ],
            [
                'kk_id' => 2,
                'warga_id' => 2,
                'status_hubungan' => 2,
            ],
        ];
        DB::table('detail_kk')->insert($data);
    }
}