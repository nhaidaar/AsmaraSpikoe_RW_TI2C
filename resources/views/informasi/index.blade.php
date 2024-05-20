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
                <a class="innerCard" href="{{ route('detailInformasi', $item->pengumuman_id) }}">
                    <img src="{{ asset('img/informasi/' . $item->pengumuman_id . '.png') }}" alt="Pengumuman" class="h-56 w-full flex self-center rounded-xl object-cover">
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
        @if ($kegiatan->isEmpty())
            <p class="py-4 text-center sm:text-lg font-normal opacity-80 text-Neutral-40 fadeIn">Tidak ada kegiatan terbaru.</p>
        @else
            <div class="w-full bg-Neutral-0 overflow-x-auto">
                <table class="text-left text-nowrap">
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
                        <tr class="fadeIn">
                            <td>{{ $item->kegiatan_nama }}</td>
                            <td>{{ Carbon::parse($item->tanggal_waktu)->translatedFormat('j F Y') }}</td>
                            <td>{{ Carbon::parse($item->tanggal_waktu)->format('H:i') }} WIB</td>
                            <td>{{ $item->kegiatan_lokasi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</main>
@endsection