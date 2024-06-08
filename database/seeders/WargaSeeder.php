<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

require_once 'vendor/autoload.php';

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 210; $i++) {
            $alamatDomisili = $faker->streetAddress();
            $alamatKtp = $faker->streetAddress();

            DB::table('warga')->insert([
                'nik'               => $faker->nik(),
                'nama_warga'        => $faker->name(),
                'tempat_lahir'      => $faker->city(),
                'tanggal_lahir'     => $faker->date(),
                'jenis_kelamin'     => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat_ktp'        => $faker->randomElement([$alamatDomisili, $alamatKtp]),
                'alamat_domisili'   => $alamatKtp,
                // 'agama'             => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu', 'Lainnya']),
                // 'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'agama'             => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Islam', 'Islam', 'Islam', 'Islam']),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin']),
                'status_warga'      => 'Hidup',
                'pekerjaan'         => $faker->numberBetween(1, 99),
            ]);
        }
    }
}
