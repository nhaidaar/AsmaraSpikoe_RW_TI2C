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
                'no_kk' => '1234567890123456',
                'nama_warga' => 'Rafi Dura',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'alamat_ktp' => 'Jl. Djuanda No. 123',
                'alamat_domisili' => 'Jl. Djuanda No. 123',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Menikah',
                'pekerjaan' => 'UI Designer',
            ],
            [
                'nik' => '1234567890123457',
                'no_kk' => '1234567890123457',
                'nama_warga' => 'Nopal Barudak',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1992-02-02',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_ktp' => 'Jl. Kenangan No. 124',
                'alamat_domisili' => 'Jl. Kenangan No. 124',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Menikah',
                'pekerjaan' => 'Wiraswasta',
            ],
            [
                'nik' => '1234567890123458',
                'no_kk' => '1234567890123458',
                'nama_warga' => 'AK Falah',
                'tempat_lahir' => 'Turen',
                'tanggal_lahir' => '2024-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'alamat_ktp' => 'Jl. Remujung No. 12',
                'alamat_domisili' => 'Jl. DjuaRemujung No. 123',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Menikah',
                'pekerjaan' => 'Backend Developer',
            ],
            [
                'nik' => '1234567890123459',
                'no_kk' => '1234567890123459',
                'nama_warga' => 'Irsyad',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2000-02-02',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_ktp' => 'Jl. Raya No. 124',
                'alamat_domisili' => 'Jl. Raya No. 124',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Menikah',
                'pekerjaan' => 'Wiraswasta',
            ],
            [
                'nik' => '1234567890123451',
                'no_kk' => '1234567890123451',
                'nama_warga' => 'Cintya',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2023-02-02',
                'jenis_kelamin' => 'Perempuan',
                'alamat_ktp' => 'Jl. Jauh No. 14',
                'alamat_domisili' => 'Jl. Jauh No. 14',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Menikah',
                'pekerjaan' => 'Pengacara',
            ],
        ];
        DB::table('warga')->insert($data);
    }
}
