<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nik' => '1234567890123456',
                'nama_warga' => 'Rafi Sampang',
                'tempat_lahir' => 'Sampang',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'alamat_ktp' => 'Jl. KTP No. 123',
                'alamat_domisili' => 'Jl. Domisili No. 123',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 1, 
            ],
            [
                'nik' => '1234567890123457',
                'nama_warga' => 'Cintya',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1992-02-02',
                'jenis_kelamin' => 'Perempuan',
                'alamat_ktp' => 'Jl. KTP No. 124',
                'alamat_domisili' => 'Jl. Domisili No. 124',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 2, 
            ],
        ];
        DB::table('warga')->insert($data);
    }
}
