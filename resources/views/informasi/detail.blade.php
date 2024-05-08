@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-0">

        <section class="outerCard bg-Additional-Base h-[264px] justify-end">
            <p class="py-1 text-4xl text-Neutral-0 text-center">Informasi Kegiatan</p>
        </section>

        <section class="outerCard bg-Neutral-0">
            <div class="px-40 flex flex-col gap-6">
                <div class="rounded-lg h-80 bg-[url('/public/img/example1.png')] bg-cover"></div>
                <div class="flex flex-col gap-6">
                    <h3 class="text-2xl font-medium text-Neutral-Base">Pengumuman Gotong Royong</h3>
                    <div class="border-b-2"></div>
                    <p class="text-lg text-Neutral-Base">
                        Assalamualaikum Wr.Wb <br>
                        Kepada seluruh warga RT 2 RW 4 Gondorejo,
                    </p>
                    <p class="text-lg text-Neutral-Base">
                        Dalam rangka menjaga kebersihan lingkungan dan memastikan kesehatan serta keamanan bersama, kami mengundang seluruh warga RT 2 RW 4 untuk berpartisipasi dalam kegiatan gotong royong membersihkan selokan. Detail kegiatan adalah sebagai berikut:
                    </p>
                    <p class="text-lg text-Neutral-Base">
                        Tanggal: Sabtu, 27 Maret 2024 <br> 
                        Waktu: Pukul 07:00 - selesai <br> 
                        Tempat: Tepi selokan di sepanjang RT 2 RW 4 Gondorejo
                    </p>
                    <p class="text-lg text-Neutral-Base">
                        Mari bergotong royong untuk membersihkan selokan guna mencegah genangan air dan penyakit yang mungkin timbul akibat kebersihan yang kurang terjaga. Harap semua warga dapat hadir dan membawa peralatan pembersih seperti sapu, sekop, dan ember. Kami mengharapkan partisipasi aktif dari seluruh warga untuk menjadikan kegiatan ini sukses dan bermanfaat bagi kita semua. Terima kasih atas perhatian dan kerjasamanya.
                    </p>
                    <p class="text-lg text-Neutral-Base">
                        Hormat Kami, <br>
                        Pengurus RT 2 RW 4 Gondorejo.
                    </p>
                </div>
            </div>
        </section>

    </main>
@endsection