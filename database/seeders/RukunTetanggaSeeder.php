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
                'rt_id' => '001',
                'pengurus_rt' => '1234567890123456',
                'jabatan' => 'Ketua RT 1',
                'no_telepon' => '081234567890',
            ],
            [
                'rt_id' => '002',
                'pengurus_rt' => '1234567890123457',
                'jabatan' => 'Ketua RT 2',
                'no_telepon' => '082345678901',
            ],
            [
                'rt_id' => '003',
                'pengurus_rt' => '1234567890123456',
                'jabatan' => 'Ketua RT 3',
                'no_telepon' => '081234567890',
            ],
            [
                'rt_id' => '004',
                'pengurus_rt' => '1234567890123457',
                'jabatan' => 'Ketua RT 4',
                'no_telepon' => '082345678901',
            ],
            [
                'rt_id' => '005',
                'pengurus_rt' => '1234567890123456',
                'jabatan' => 'Ketua RT 5',
                'no_telepon' => '081234567890',
            ],
            [
                'rt_id' => '006',
                'pengurus_rt' => '1234567890123457',
                'jabatan' => 'Ketua RT 6',
                'no_telepon' => '082345678901',
            ],
            [
                'rt_id' => '007',
                'pengurus_rt' => '1234567890123457',
                'jabatan' => 'Ketua RT 7',
                'no_telepon' => '082345678901',
            ],
           
        ];
        DB::table('rukun_tetangga')->insert($data);
    }
}
