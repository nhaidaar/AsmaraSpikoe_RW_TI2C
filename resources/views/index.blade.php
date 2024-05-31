@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@extends('layout.template')

@section('content')
    <main class="bg-Neutral-0">

        {{-- Header --}}
        <section class="m-2 p-10 flex flex-col gap-5 rounded-xl border border-Neutral-0 bg-Neutral-0 bg-[url('/public/img/Hero.png')] bg-center bg-cover h-[636px] lg:h-[848px] items-center">
            <p class="py-2 px-4 bg-Additional-Base rounded-full w-fit font-normal text-base md:text-lg text-Neutral-0 text-center">
                Hi, Selamat Datang! 👋🏻
            </p>

            <div class="flex flex-col gap-5 text-Neutral-Base">
                <p class="font-medium text-4xl md:text-5xl lg:text-6xl text-center leading-none">Lihat Datamu <br>
                    di Dusun Gondorejo.</p>
                <p class="text-Neutral-40 text-center text-base md:text-lg text-nowrap">
                    Cek dan lihat datamu di dusun Gondorejo RW 4. <br> 
                    Mari jelajahi Gondorejo bersama kami!
                </p>
            </div>
        </section>

        {{-- Tentang --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12">
            <div class="flex gap-2 items-center">
                <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                <p class="font-medium text-base text-Neutral-Base">
                    TENTANG
                </p>
            </div>
    
            <p class="font-normal text-2xl md:text-3xl lg:text-4xl leading-relaxed">
                Gondorejo adalah sebuah dusun yang terletak di Desa Tamanharjo, Kecamatan Singosari, Kabupaten Malang. Sebagai RW 4, Gondorejo terdiri dari 7 RT yang harmonis dan penuh kebersamaan.
            </p>
        </section>
        
        {{-- Visi Misi --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12">
            <div class="flex gap-2 items-center">
                <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                <p class="font-medium text-base text-Neutral-Base">
                    VISI MISI
                </p>
            </div>
    
            <div class="flex flex-col lg:flex-row gap-[60px] items-center justify-between">
                <p class="font-normal text-3xl md:text-4xl lg:text-5xl text-Neutral-Base">
                    Lorem ipsum dolor sit amet consectetur. Turpis conse
                </p>

                <p class="font-normal text-base text-Neutral-40">
                    Lorem ipsum dolor sit amet consectetur. Adipiscing tempor libero sapien suspendisse consectetur sociis et feugiat. Ipsum facilisi sit lobortis sit.
                </p>
            </div>
        </section>

        {{-- Program --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12">
            <div class="flex gap-2 items-center">
                <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                <p class="font-medium text-base text-Neutral-Base">
                    PROGRAM
                </p>
            </div>
    
            <div class="flex flex-col lg:flex-row gap-8 items-center justify-between">
                <p class="font-normal text-3xl md:text-4xl lg:text-5xl text-Neutral-Base">
                    Lorem ipsum dolor sit amet consectetur. Turpis conse
                </p>

                <p class="font-normal text-base text-Neutral-40">
                    Lorem ipsum dolor sit amet consectetur. Adipiscing tempor libero sapien suspendisse consectetur sociis et feugiat. Ipsum facilisi sit lobortis sit.
                </p>
            </div>

            <div class="flex flex-col gap-3">
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
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- PENGUMUMAN TERKINI --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12 items-center">
            <div class="flex flex-col gap-5">
                <div class="flex gap-2 items-center">
                    <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                    <p class="font-medium text-base text-Neutral-Base">
                        PENGUMUMAN TERKINI
                    </p>
                </div>
        
                <div class="flex flex-col lg:flex-row gap-8 items-center justify-between">
                    <p class="font-normal text-3xl md:text-4xl lg:text-5xl text-Neutral-Base">
                        Lorem ipsum dolor sit amet consectetur. Turpis conse
                    </p>

                    <p class="font-normal text-base text-Neutral-40">
                        Lorem ipsum dolor sit amet consectetur. Adipiscing tempor libero sapien suspendisse consectetur sociis et feugiat. Ipsum facilisi sit lobortis sit.
                    </p>
                </div>
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
                    </div>
                @endforeach
            </div>

            <a href="{{ route('informasi') }}" class="buttonDark w-min">
                Lihat Semua
            </a>
        </section>

        {{-- Map --}}
        <section class="py-20 px-20">
            <div class="bg-Neutral-10 rounded-xl h-[696px] w-full"></div>
        </section>

        {{-- Footer --}}
        <footer class="py-20 px-8 md:px-12 lg:px-[60px] justify-between bg-Neutral-100 flex">    
            {{-- <div class="flex justify-between">
                <div class="flex flex-col gap-4">
                    <p class="text-Neutral-0 text-xl">
                        Informasi
                    </p>
                    <a href="" class="flex flex-col gap-4 text-Neutral-40 text-base">
                        <p>About</p>
                        <p>Featured</p>
                        <p>Integrations</p>
                    </a>
                </div>
                
                <div class="flex flex-col gap-4">
                    <p class="text-Neutral-0 text-xl">
                        Informasi
                    </p>
                    <a href="" class="flex flex-col gap-4 text-Neutral-40 text-base">
                        <p>About</p>
                        <p>Featured</p>
                        <p>Integrations</p>
                    </a>
                </div>

                <div class="flex flex-col gap-4">
                    <p class="text-Neutral-0 text-xl">
                        Informasi
                    </p>
                    <a href="" class="flex flex-col gap-4 text-Neutral-40 text-base">
                        <p>About</p>
                        <p>Featured</p>
                        <p>Integrations</p>
                    </a>
                </div>

                <div class="flex flex-col gap-4">
                    <p class="text-Neutral-0 text-xl">
                        Informasi
                    </p>
                    <a href="" class="flex flex-col gap-4 text-Neutral-40 text-base">
                        <p>About</p>
                        <p>Featured</p>
                        <p>Integrations</p>
                    </a>
                </div>

                <div class="flex flex-col gap-4">
                    <p class="text-Neutral-0 text-xl">
                        Informasi
                    </p>
                    <a href="" class="flex flex-col gap-4 text-Neutral-40 text-base">
                        <p>About</p>
                        <p>Featured</p>
                        <p>Integrations</p>
                    </a>
                </div>
            </div> --}}

            <div class="flex flex-col gap-8 text-Neutral-0 w-full">
                <div class="border-t-[1px] border-[#3A3A3A]"></div>
                <div class="flex flex-col md:flex-row gap-12 items-center justify-between">
                    <a href="/" class="flex gap-1.5 items-center">
                        <img src="/img/main_logo.png" class="w-8 h-8 m-0.5" alt="Gondorejo">
                        <p class="text-2xl font-normal">Gondorejo</p>
                    </a>
                    <p class="text-base font-normal">
                        © Copyright {{now()->year}} Gondorejo. All Right Reserved.
                    </p>
                </div>
            </div>
        </footer>
    </main>
@endsection