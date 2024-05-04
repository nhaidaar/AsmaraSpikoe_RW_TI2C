<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pekerjaan_nama' => 'UI/UX Designer',
            ],
            [
                'pekerjaan_nama' => 'Data Analis',
            ],
            [
                'pekerjaan_nama' => 'Programmer',
            ],
        ];
        DB::table('pekerjaan')->insert($data);
    }
}
