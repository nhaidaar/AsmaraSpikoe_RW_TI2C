<?php

namespace Database\Seeders;

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
        $data = [
            [
                'ketua_rt'      => 1,
                'no_telepon'    => '081234567890',
            ],
            [
                'ketua_rt'      => 2,
                'no_telepon'    => '087654321098',
            ],
        ];
        
        DB::table('rukun_tetangga')->insert($data);
    }
}
