<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusHubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'keterangan' => 'Kepala Keluarga',
            ],
            [
                'keterangan' => 'Istri',
            ],
            [
                'keterangan' => 'Anak',
            ],
        ];
        
        DB::table('status_hubungan')->insert($data);
    }
}
