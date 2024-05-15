@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@extends('layout.template')

@section('content')
<main class="p-2 flex flex-col gap-2 bg-Neutral-10">
    <section class="outerCard">
        <p class="cardTitle">Pengumuman Terkini!</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 justify-between gap-3">
            @foreach ($pengumuman as $item)
                <a class="innerCard" href="/informasi/{{ $item->pengumuman_id }}">
                    <div class="rounded-xl h-56 bg-[url('/public/img/example1.png')] bg-cover"></div>
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title">{{ $item->pengumuman_nama }}</p>
                        <p class="subtitle text-Neutral-40">{{ $item->pengumuman_lokasi }} - {{ Carbon::parse($item->tanggal_waktu)->translatedFormat('j F \j\a\m H:i') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <section class="outerCard">
        <p class="cardTitle">Informasi Kegiatan</p>
        <table class="text-left w-full overflow-x-auto">
            <thead class="border-b">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatan as $item)
                <tr>
                    <td>{{ $item->kegiatan_nama }}</td>
                    <td>{{ Carbon::parse($item->tanggal_waktu)->translatedFormat('j F Y') }}</td>
                    <td>{{ Carbon::parse($item->tanggal_waktu)->format('H:i') }} WIB</td>
                    <td>{{ $item->kegiatan_lokasi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>
@endsection