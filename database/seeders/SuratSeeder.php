<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'surat_pengaju' => '1234567890123456', 
                'surat_jenis' => 'Surat Pengantar',
                'surat_tujuan' => 'Administrasi Kependudukan',
                'surat_taggal' => now(),
            ],
            [
                'surat_pengaju' => '1234567890123457', 
                'surat_jenis' => 'Surat Pernyataan Tidak Mampu',
                'surat_tujuan' => 'Pengajuan Bantuan Sosial',
                'surat_taggal' => now(),
            ],
        ];
        DB::table('surat')->insert($data);
    }
}
