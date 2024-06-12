<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $startDate = '2024-01-01';
        $endDate = '2024-06-30';

        for ($rt = 1; $rt <= 7; $rt++) {
            for ($j = 0; $j < 3; $j++) {
                DB::table('keuangan')->insert([
                    'rt_id' => $rt,
                    'tanggal' => $faker->dateTimeBetween($startDate, $endDate),
                    'jenis_keuangan' => 'Pemasukkan',
                    'nominal' => $faker->randomElement([500000, 300000, 250000, 200000, 150000]),
                    'keterangan_keuangan' => $faker->randomElement(['Kas rutin', 'Iuran sampah', 'Iuran kematian']),
                ]);
            }

            for ($j = 3; $j < 5; $j++) {
                DB::table('keuangan')->insert([
                    'rt_id' => $rt,
                    'tanggal' => $faker->dateTimeBetween($startDate, $endDate),
                    'jenis_keuangan' => 'Pengeluaran',
                    'nominal' => $faker->randomElement([500000, 300000, 250000, 200000, 150000]),
                    'keterangan_keuangan' => $faker->randomElement(['Pembayaran sampah', 'Pembelian kain kafan']),
                ]);
            }
        }
    }
}
