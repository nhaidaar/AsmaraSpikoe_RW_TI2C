<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\StatusHubunganModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PekerjaanSeeder::class,
            WargaSeeder::class,
            DetailWargaSeeder::class,
            UsersSeeder::class,
            PengumumanSeeder::class,
            KegiatanSeeder::class,
            RukunTetanggaSeeder::class,
            KartuKeluargaSeeder::class,
            StatusHubSeeder::class,
            DetailKKSeeder::class,
            SuratSeeder::class,
            BansosSeeder::class,
            KriteriaBansosSeeder::class,
            PendaftarBansosSeeder::class,
            KriteriaPenerimaSeeder::class,
            PenerimaBansosSeeder::class,
            KeuanganSeeder::class
        ]);
    }
}
