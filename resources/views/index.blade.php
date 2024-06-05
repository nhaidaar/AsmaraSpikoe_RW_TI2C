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
                <p class="font-medium text-4xl md:text-5xl lg:text-6xl text-center leading-none">
                    Lihat Datamu <br>
                    di Dusun Gondorejo.</p>
                <p class="text-Neutral-40 text-center text-base md:text-lg text-nowrap">
                    Cek dan lihat datamu di dusun Gondorejo RW 4. <br> 
                    Mari jelajahi Gondorejo bersama kami!
                </p>
            </div>
        </section>

        {{-- Tentang --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-5">
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
        
        {{-- Kegiatan Warga --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12">
            <div class="flex flex-col gap-5">
                <div class="flex gap-2 items-center">
                    <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                    <p class="font-medium text-base text-Neutral-Base">
                        KEGIATAN WARGA
                    </p>
                </div>
        
                <div class="flex flex-col lg:flex-row gap-[60px] items-center justify-between">
                    <p class="font-normal text-3xl md:text-4xl lg:text-5xl text-Neutral-Base max-w-[570px] leading-6">
                        Rangkaian Kegiatan Tahunan Desa Gondorejo.
                    </p>

                    <p class="font-normal text-base text-Neutral-40">
                        Jangan lupa untuk datang dan berpartisipasi dalam rangkaian kegiatan tahunan Desa Gondorejo. Ikutilah keseruan dalam kegiatan keagamaan, kemerdekaan dan lainnya.
                    </p>
                </div>
            </div>

            <div class="flex gap-[60px] items-center">
                <div class="flex flex-col gap-2 w-[610px]">
                    <div class="py-5 px-5 border-solid border-2 border-Neutral-20 rounded-xl text-Neutral-base bg-Neutral-0 text-xl">
                        Peringatan Hari Kemerdekaan Indonesia
                    </div>
                    <div class="py-5 px-5 border-solid border-2 border-Neutral-20 rounded-xl text-Neutral-base bg-Neutral-0 text-xl">
                        Maulid Nabi
                    </div>
                    <div class="py-5 px-5 border-solid border-2 border-Neutral-20 rounded-xl text-Neutral-base bg-Neutral-0 text-xl">
                        Pengajian Akbar
                    </div>
                    <div class="py-5 px-5 border-solid border-2 border-Neutral-20 rounded-xl text-Neutral-base bg-Neutral-0 text-xl">
                        Karnaval
                    </div>
                    <div class="py-5 px-5 border-solid border-2 border-Neutral-20 rounded-xl text-Neutral-base bg-Neutral-0 text-xl">
                        Bantengan
                    </div>
                </div>
                
                <div class="bg-Neutral-10 w-[652px] h-[442px] rounded-xl"></div>
            </div>
        </section>

        {{-- Data Pertumbuhan Warga --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12 items-center">
            <div class="flex flex-col gap-5">
                <div class="flex gap-2 items-center">
                    <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                    <p class="font-medium text-base text-Neutral-Base">
                        DATA PERTUMBUHAN WARGA
                    </p>
                </div>
        
                <div class="flex flex-col lg:flex-row gap-8 items-center justify-between">
                    <p class="font-normal text-3xl md:text-4xl lg:text-5xl text-Neutral-Base">
                        Data Pertumbuhan Warga RW Gondorejo
                    </p>

                    <p class="font-normal text-base text-Neutral-40">
                        Temukan informasi lebih lanjut dari data penduduk warga Gondorejo setiap tahunnya.
                    </p>
                </div>
            </div>

            <div class="">

            </div>
        </section>

        {{-- UMKM --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12 items-center">
            <div class="flex flex-col gap-5">
                <div class="flex gap-2 items-center">
                    <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                    <p class="font-medium text-base text-Neutral-Base">
                        UMKM
                    </p>
                </div>
        
                <div class="flex flex-col lg:flex-row gap-8 items-center justify-between">
                    <p class="font-normal text-3xl md:text-4xl lg:text-5xl text-Neutral-Base">
                        Jelajahi Ragam Hidangan dari UMKM Lokal.
                    </p>

                    <p class="font-normal text-base text-Neutral-40">
                        Temukan berbagai hidangan lezat yang dibuat dengan resep tradisional dan bahan-bahan segar pilihan. Buat lidah perutmu jadi manja dengan berbagai pilihan kuliner di Gondorejo.
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
        </section>

        {{-- Map --}}
        <section class="py-20 px-12">
            <div class="bg-Neutral-10 rounded-xl h-[696px] w-full"></div>
        </section>

        {{-- Footer --}}
        <footer class="py-20 px-12 md:px-12 lg:px-[60px] justify-between bg-Neutral-100 flex flex-col gap-[60px]">    
            <div class="flex justify-between items-center">
                <div class="flex gap-[80px]">
                    <div class="flex flex-col gap-4">
                        <p class="text-Neutral-0 text-xl">
                            Menu
                        </p>
                        <div class="flex flex-col gap-4 text-Neutral-40 text-base">
                            <a href="http://127.0.0.1:8000/informasi" class="hover:text-Neutral-0">Informasi</a>
                            <a href="http://127.0.0.1:8000/bansos" class="hover:text-Neutral-0">Bantuan Sosial</a>
                            <a href="http://127.0.0.1:8000/persuratan" class="hover:text-Neutral-0">Persuratan</a>
                            <a href="http://127.0.0.1:8000/rt" class="hover:text-Neutral-0">Struktur</a>
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <p class="text-Neutral-0 text-xl">
                            Kontributor
                        </p>
                        <div class="flex flex-col gap-4 text-Neutral-40 text-base">
                            <a href="https://www.linkedin.com/in/chyntia-santi/" class="hover:text-Neutral-0">Chyntia Santi Nur Trisnawati</a>
                            <a href="https://www.linkedin.com/in/ahmad-khoirul-falah-70b275251/" class="hover:text-Neutral-0">Ahmad Khoirul Falah</a>
                            <a href="https://www.linkedin.com/in/irsyaddani/" class="hover:text-Neutral-0">Irsyad Danisaputra</a>
                            <a href="https://www.linkedin.com/in/nhaidaar/" class="hover:text-Neutral-0">Muhammad Naufal Haidar S.</a>
                            <a href="https://www.linkedin.com/in/rayyanalfirdausi/" class="hover:text-Neutral-0">Rayyan Al Firdausi</a>
                        </div>
                    </div>
                </div>

                <div class=" flex flex-col gap-5 items-end">
                    <div class="text-Neutral-40">
                        Supported By
                    </div>
                    <div class="flex gap-5">
                        <img src="{{ asset("img/Logo_Polinema.png") }}" alt="Logo Polinema" class="text-Neutral-0 w-[60px]">
                        <img src="{{ asset("img/Logo_JTI.png") }}" alt="Logo JTI" class="text-Neutral-0 w-[60px]">
                    </div>
                </div>
            </div>

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