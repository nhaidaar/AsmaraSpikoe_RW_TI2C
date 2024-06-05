<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pengumuman_nama'   => 'Pemadaman Listrik',
                'pengumuman_lokasi' => 'RT 2 sampai RT 4',
                'pengumuman_detail' => '',
                'tanggal_waktu'     => now(),
                'user_id'           => 1,
            ],
            [
                'pengumuman_nama'   => 'Pemadaman Air',
                'pengumuman_lokasi' => 'RT 3',
                'pengumuman_detail' => '',
                'tanggal_waktu'     => now(),
                'user_id'           => 2,
            ],
            [
                'pengumuman_nama'   => 'Pengaspalan jalan',
                'pengumuman_lokasi' => 'RT 5',
                'pengumuman_detail' => '',
                'tanggal_waktu'     => now(),
                'user_id'           => 1,
            ],
            [
                'pengumuman_nama'   => 'Gotong Royong',
                'pengumuman_lokasi' => 'RT 2',
                'pengumuman_detail' =>
                'Assalamualaikum Wr.Wb
                Kepada seluruh warga RT 2 RW 4 Gondorejo,
                
                Dalam rangka menjaga kebersihan lingkungan dan memastikan kesehatan serta keamanan bersama, kami mengundang seluruh warga RT 2 RW 4 untuk berpartisipasi dalam kegiatan gotong royong membersihkan selokan. Detail kegiatan adalah sebagai berikut:
                
                Tanggal: Sabtu, 27 Maret 2024
                Waktu: Pukul 07:00 - selesai
                Tempat: Tepi selokan di sepanjang RT 2 RW 4 Gondorejo
                
                Mari bergotong royong untuk membersihkan selokan guna mencegah genangan air dan penyakit yang mungkin timbul akibat kebersihan yang kurang terjaga. Harap semua warga dapat hadir dan membawa peralatan pembersih seperti sapu, sekop, dan ember. Kami mengharapkan partisipasi aktif dari seluruh warga untuk menjadikan kegiatan ini sukses dan bermanfaat bagi kita semua. Terima kasih atas perhatian dan kerjasamanya.
                
                Hormat Kami,
                Pengurus RT 2 RW 4 Gondorejo.',
                'tanggal_waktu'     => now(),
                'user_id'           => 2,
            ],
        ];
        DB::table('pengumuman')->insert($data);
    }
}
