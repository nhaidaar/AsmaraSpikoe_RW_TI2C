<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'umkm_id'   => 1,
                'umkm_nama' => 'Bakso Mie Ayam "Cak Jum"',
                'umkm_alamat'  => 'Jl. Protokol Baturetno No.117',
                'umkm_link'  => 'https://maps.app.goo.gl/wRmvBYYfCtyU7NKn6',
            ],
            [
                'umkm_id'   => 2,
                'umkm_nama' => 'Kedai Mampir Ngombe',
                'umkm_alamat'  => 'Jl. Rogonoto, Gondorejo Ledok',
                'umkm_link'  => 'https://maps.app.goo.gl/wRmvBYYfCtyU7NKn6',
            ],
            [
                'umkm_id'   => 3,
                'umkm_nama' => 'ES Bubble Drink GSMK Singosari',
                'umkm_alamat'  => 'Jl. Rogonoto, Gondorejo Ledok',
                'umkm_link'  => 'https://maps.app.goo.gl/Rg2vvKXJEXES8Y4VA',
            ],
            [
                'umkm_id'   => 4,
                'umkm_nama' => 'Nasi Goreng Ambyar',
                'umkm_alamat'  => 'Jl. Rogonoto, Gondorejo Ledok',
                'umkm_link'  => 'https://maps.app.goo.gl/UtsQ64dmMyzRHLPp8',
            ],
        ];

        DB::table('umkm')->insert($data);
    }
}
