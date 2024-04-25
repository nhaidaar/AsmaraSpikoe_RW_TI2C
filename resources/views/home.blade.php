@extends('layout.template')

@section('content')
<main class="p-2 flex flex-col gap-2">
    <section class="outerCard">
        <p class="cardTitle">Pengumuman Terkini!</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 justify-between gap-3">
            @for ($i = 1; $i <= 4; $i++)
            <div class="innerCard">
                <div class="rounded-xl h-56 bg-[url('/public/img/example1.png')] bg-cover"></div>
                <div class="p-1 flex flex-col gap-1">
                    <p class="title">Pengumuman Gotong Royong</p>
                    <p class="subtitle text-Neutral-40">Rogonoto Timur No. 78 - 15 Maret at 10:20</p>
                </div>
            </div>
            @endfor
        </div>
    </section>
    <section class="outerCard">
        <p class="cardTitle">Informasi Kegiatan</p>
        <table class="text-left min-w-full">
            <thead class="border-b">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th class="hidden md:table-cell">Waktu</th>
                    <th class="hidden md:table-cell">Tempat</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td>Sosialisasi Bantuan Sosial</td>
                    <td>19 Maret 2024</td>
                    <td class="hidden md:table-cell">10:00 WIB</td>
                    <td class="hidden md:table-cell">Rumah Pediaman Irsyad Dani</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </section>
</main>
@endsection