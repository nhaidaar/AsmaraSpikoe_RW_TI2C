@php
use Carbon\Carbon;
Carbon::setLocale('id');

$user = Auth::user();
@endphp

@extends('layout.template')

@section('content')
<main class="p-2 flex flex-col gap-2 bg-Neutral-10">
    <section class="outerCard">
        <div class="flex justify-between items-center gap-2">
            <p class="cardTitle">Pengumuman Terkini</p>
            @if ($user)    
                <a href="{{ route('createPengumuman') }}" class="flex items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 6V18M18 12H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Tambah Pengumuman
                </a>
            @endif
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 justify-between gap-3">
            @foreach ($pengumuman as $item)
                <div class="innerCard">
                    <a href="{{ route('detailPengumuman', $item->pengumuman_id) }}" class="flex flex-col gap-3">
                        <img src="{{ asset('img/pengumuman/' . $item->pengumuman_id . '.png') }}" alt="Pengumuman" class="h-56 w-full flex self-center rounded-xl object-cover">
                        <div class="p-1 flex flex-col gap-1">
                            <p class="title">{{ $item->pengumuman_nama }}</p>
                            <p class="subtitle text-Neutral-40">{{ $item->pengumuman_lokasi }} - {{ Carbon::parse($item->tanggal_waktu)->translatedFormat('j F \j\a\m H:i') }}</p>
                        </div>
                    </a>
                    @if ($user)    
                        <div class="flex gap-2">
                            <a href="{{ route('editPengumuman', $item->pengumuman_id) }}" class="buttonLight w-full">Edit</a>
                            <a href="#" class="buttonLight w-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="#C04949" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6.176h16M10 16.765v-6.353m4 6.353v-6.353M16 21H8c-1.105 0-2-.948-2-2.118V7.235c0-.584.448-1.059 1-1.059h10c.552 0 1 .475 1 1.06v11.646c0 1.17-.895 2.118-2 2.118ZM10 6.176h4c.552 0 1-.474 1-1.058v-1.06C15 3.475 14.552 3 14 3h-4c-.552 0-1 .474-1 1.059v1.059c0 .584.448 1.058 1 1.058Z"/>
                                </svg>                                  
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
    <section class="outerCard">
        <div class="flex justify-between items-center gap-2">
            <p class="cardTitle">Informasi Kegiatan</p>
            @if ($user)
                <a href="{{ route('createKegiatan') }}" class="flex items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 6V18M18 12H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Tambah Informasi
                </a>
            @endif
        </div>
        @if ($kegiatan->isEmpty())
            <p class="py-4 text-center sm:text-lg font-normal opacity-80 text-Neutral-40 fadeIn">Tidak ada kegiatan terbaru.</p>
        @else
            <div class="w-full bg-Neutral-0 overflow-x-auto fadeIn">
                <table class="text-left text-nowrap">
                    <thead class="border-b">
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            @if ($user)
                                <th class="max-w-20"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $item)
                        <tr>
                            <td>{{ $item->kegiatan_nama }}</td>
                            <td>{{ Carbon::parse($item->tanggal_waktu)->translatedFormat('j F Y') }}</td>
                            <td>{{ Carbon::parse($item->tanggal_waktu)->format('H:i') }} WIB</td>
                            <td>{{ $item->kegiatan_lokasi }}</td>
                            @if ($user)
                                <td class="flex gap-2 max-w-40">
                                    <a href="{{ route('editKegiatan', $item->kegiatan_id) }}" class="buttonLight w-full md:w-min">Edit</a>
                                    <a href="#" class="buttonLight flex items-center w-fit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none" viewBox="0 0 18 20">
                                            <path stroke="#C04949" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 4.176h16M7 14.765V8.412m4 6.353V8.412M13 19H5c-1.105 0-2-.948-2-2.118V5.235c0-.584.448-1.059 1-1.059h10c.552 0 1 .475 1 1.06v11.646c0 1.17-.895 2.118-2 2.118ZM7 4.176h4c.552 0 1-.474 1-1.058v-1.06C12 1.475 11.552 1 11 1H7c-.552 0-1 .474-1 1.059v1.059c0 .584.448 1.058 1 1.058Z"/>
                                        </svg>                                                                          
                                    </a>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</main>
@endsection