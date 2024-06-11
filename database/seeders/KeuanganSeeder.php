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

        $rt = 1;
        for ($i = 1; $i <= 25; $i++) {
            $jenisKeuangan = $faker->randomElement(['Pemasukkan', 'Pengeluaran']);

            if ($jenisKeuangan === 'Pemasukkan') {
                $keteranganKeuangan = $faker->randomElement(['Kas rutin', 'Iuran sampah', 'Iuran kematian']);
            } else {
                $keteranganKeuangan = $faker->randomElement(['Pembayaran sampah', 'Pembelian kain kafan']);
            }

            DB::table('keuangan')->insert([
                'rt_id'                 => $rt,
                'tanggal'               => $faker->dateTimeBetween($startDate, $endDate),
                'jenis_keuangan'        => $jenisKeuangan,
                'nominal'               => $faker->randomElement([500000, 300000, 250000, 200000, 150000]),
                'keterangan_keuangan'   => $keteranganKeuangan
            ]);

            $rt++;
            if ($rt == 8) {
                $rt = 1;
            }
        }
    }
}
