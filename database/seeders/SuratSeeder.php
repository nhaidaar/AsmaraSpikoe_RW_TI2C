<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'surat_id' => Str::uuid(),
                'surat_pengaju' => 1,
                'surat_jenis' => 'Surat Pengantar',
                'surat_tujuan' => 'Administrasi Kependudukan',
                'surat_tanggal' => now(),
            ],
        ];
        DB::table('surat')->insert($data);
    }
}
