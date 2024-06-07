@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@extends('layout.template')

@section('content')
    <main class="bg-Neutral-0">

        {{-- Header --}}
        <section class="m-3">
            <div class=" flex justify-between bg-Neutral-10 rounded-xl">
                {{-- Kiri --}}
                <div class="flex flex-col justify-between gap-12 p-10">
                    <div class="flex flex-col gap-12">
                        <div class="items-left flex flex-col gap-5">
                            <p class="py-2 px-4 bg-Additional-Base rounded-full w-fit font-normal text-base md:text-lg text-Neutral-0 text-center">
                                Hi, Selamat Datang! 👋🏻
                            </p>
                            <h1 class="font-medium text-4xl md:text-5xl lg:text-6xl leading-none">
                                Lihat Datamu <br>
                                di Dusun Gondorejo.
                            </h1>
                            <h3 class="text-Neutral-40 text-base md:text-lg text-nowrap">
                                Cek dan lihat datamu di dusun Gondorejo RW 4. <br> 
                                Mari jelajahi Gondorejo bersama kami!
                            </h3>
                        </div>

                        <div class="flex  gap-2">
                            <a href="{{ route('bansos') }}" class="bg-Primary-Base w-min rounded-lg py-3 px-4 font-normal text-base md:text-lg text-Neutral-0 text-center text-nowrap">
                                Cek Bansos
                            </a>
                            <a href="{{ route('persuratan') }}" class="bg-Neutral-0 w-min rounded-lg py-3 px-4 font-normal text-base md:text-lg text-Neutral-Base text-center text-nowrap">
                                Ajukan Surat
                            </a>
                        </div>
                    </div>

                    <div class="bg-Neutral-10 flex gap-2 md:gap-16">
                        <div class="flex flex-col gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48">
                                <rect width="47" height="47" x=".5" y=".5" fill="#F0F0F0" rx="23.5"/>
                                <rect width="47" height="47" x=".5" y=".5" rx="23.5"/>
                                <g clip-path="url(#a)">
                                    <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21.333 25.333a2.667 2.667 0 1 0 5.333 0 2.667 2.667 0 0 0-5.333 0ZM18.667 36v-1.333A2.667 2.667 0 0 1 21.334 32h5.333a2.667 2.667 0 0 1 2.667 2.667V36M28 14.667a2.667 2.667 0 1 0 5.334 0 2.667 2.667 0 0 0-5.334 0Zm2.667 6.667h2.667A2.667 2.667 0 0 1 36 24v1.334M14.667 14.667a2.667 2.667 0 1 0 5.333 0 2.667 2.667 0 0 0-5.333 0ZM12 25.334V24a2.667 2.667 0 0 1 2.667-2.666h2.666"/>
                                </g>
                                <defs>
                                <clipPath id="a">
                                    <path fill="#fff" d="M8 8h32v32H8z"/>
                                </clipPath>
                                </defs>
                            </svg>
                            <div class="flex flex-col gap-1">
                                <p class="text-Neutral-base text-3xl font-medium">
                                    {{ $keluarga }}
                                </p>
                                <p class="text-Neutral-40 text-base font-normal">
                                    Jumlah keluarga
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <svg xmlns="http://www.w.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48">
                                <rect width="47" height="47" x=".5" y=".5" fill="#F0F0F0" rx="23.5"/>
                                <rect width="47" height="47" x=".5" y=".5" rx="23.5"/>
                                <g clip-path="url(#a)">
                                    <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.667 17.333a5.333 5.333 0 1 0 10.667 0 5.333 5.333 0 0 0-10.667 0ZM16 36v-2.667A5.333 5.333 0 0 1 21.333 28h5.334A5.333 5.333 0 0 1 32 33.333V36"/>
                                </g>
                                <defs>
                                <clipPath id="a">
                                    <path fill="#fff" d="M8 8h32v32H8z"/>
                                </clipPath>
                                </defs>
                            </svg>
                            <div class="flex flex-col gap-1">
                                <p class="text-Neutral-base text-3xl font-medium">
                                    {{ $wargaAktif }}
                                </p>
                                <p class="text-Neutral-40 text-base font-normal">
                                    Jumlah warga
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48">
                                <rect width="47" height="47" x=".5" y=".5" fill="#F0F0F0" rx="23.5"/>
                                <rect width="47" height="47" x=".5" y=".5" rx="23.5"/>
                                <g clip-path="url(#a)">
                                    <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.906 18.92a5.346 5.346 0 0 0 3.488 3.502m4.676-.727a5.333 5.333 0 1 0-7.453-7.402M16 36v-2.667A5.333 5.333 0 0 1 21.333 28h5.334c.549 0 1.08.083 1.577.237m3.51 3.491c.16.507.246 1.047.246 1.605V36M12 12l24 24"/>
                                </g>
                                <defs>
                                <clipPath id="a">
                                    <path fill="#fff" d="M8 8h32v32H8z"/>
                                </clipPath>
                                </defs>
                            </svg>
                            <div class="flex flex-col gap-1">
                                <p class="text-Neutral-base text-3xl font-medium">
                                    {{ $wargaTidakAktif }}
                                </p>
                                <p class="text-Neutral-40 text-base font-normal">
                                    Jumlah warga tidak aktif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kanan --}}
                <div class="p-3 w-[659px] h-[730px] hidden md:block">
                    <img src="{{ asset("img/Hero1.jpg") }}" alt="Hero" class="rounded-lg">
                </div>
        
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
                        Kumpulan Pengumuman Terkini Dusun Gondorejo.
                    </p>

                    <p class="font-normal text-base text-Neutral-40">
                        Daftar informasi terbaru yang berisi berbagai pengumuman penting dari Desa Gondorejo agar warga mendapatkan informasi secara tepat waktu dan akurat.
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

            <div class="flex flex-col gap-8 md:flex-row justify-between items-center">
                <div class="flex flex-col gap-2 w-full md:w-[520px]">
                    <div>
                        <input type="radio" id="kegiatan-1" name="kegiatan" class="hidden peer" checked>
                            <label for="kegiatan-1" class="flex items-center p-6 text-Neutral-40 border border-Neutral-10 rounded-xl peer-checked:border-Primary-30 peer-checked:text-Neutral-Base peer-checked:outline peer-checked:outline-4 peer-checked:outline-Primary-10">
                                <p class="text-xl font-normal">Peringatan Hari Kemerdekaan Indonesia</p>
                            </label>
                        </input>
                    </div>

                    <div>
                        <input type="radio" id="kegiatan-2" name="kegiatan" class="hidden peer">
                            <label for="kegiatan-2" class="flex items-center p-6 text-Neutral-40 border border-Neutral-10 rounded-xl peer-checked:border-Primary-30 peer-checked:text-Neutral-Base peer-checked:outline peer-checked:outline-4 peer-checked:outline-Primary-10">
                                <p class="text-xl font-normal">Maulid Nabi</p>
                            </label>
                        </input>
                    </div>

                    <div>
                        <input type="radio" id="kegiatan-3" name="kegiatan" class="hidden peer">
                            <label for="kegiatan-3" class="flex items-center p-6 text-Neutral-40 border border-Neutral-10 rounded-xl peer-checked:border-Primary-30 peer-checked:text-Neutral-Base peer-checked:outline peer-checked:outline-4 peer-checked:outline-Primary-10">
                                <p class="text-xl font-normal">Pengajian Akbar</p>
                            </label>
                        </input>
                    </div>

                    <div>
                        <input type="radio" id="kegiatan-4" name="kegiatan" class="hidden peer">
                            <label for="kegiatan-4" class="flex items-center p-6 text-Neutral-40 border border-Neutral-10 rounded-xl peer-checked:border-Primary-30 peer-checked:text-Neutral-Base peer-checked:outline peer-checked:outline-4 peer-checked:outline-Primary-10">
                                <p class="text-xl font-normal">Karnaval</p>
                            </label>
                        </input>
                    </div>

                    <div>
                        <input type="radio" id="kegiatan-5" name="kegiatan" class="hidden peer">
                            <label for="kegiatan-5" class="flex items-center p-6 text-Neutral-40 border border-Neutral-10 rounded-xl peer-checked:border-Primary-30 peer-checked:text-Neutral-Base peer-checked:outline peer-checked:outline-4 peer-checked:outline-Primary-10">
                                <p class="text-xl font-normal">Bantengan</p>
                            </label>
                        </input>
                    </div>
                </div>

                <img id="kegiatan-image" src="{{ asset('img/kegiatan/1.jpg') }}" alt="Kegiatan" class="bg-Neutral-10 h-[442px] w-full md:w-[60%] flex self-center rounded-xl object-cover">
                {{-- <div class="bg-Neutral-10 w-[722px] h-[442px] rounded-xl bg-[url('./img/kegiatan/1.jpg')] bg-cover"> --}}
                    {{-- <img id="kegiatan-image" src="{{ asset('img/kegiatan/1.jpg') }}" alt="kegiatan"> --}}
                {{-- </div> --}}
            </div>
        </section>

        {{-- Data Pertumbuhan Warga --}}
        {{-- <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12 items-center">
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
        </section> --}}

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
                <div class="innerCard">
                    <img src="{{ asset('img/umkm/bakso.jpg') }}" alt="umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title"> Bakso Cak Ting </p>
                        <p class="subtitle text-Neutral-40"> Gondorejo Gg. I No. 89 </p>
                    </div>
                </div>
                <div class="innerCard">
                    <img src="{{ asset('img/umkm/mie_ayam.jpg') }}" alt="umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title"> Bakso & Mie Ayam Pak Jumadi </p>
                        <p class="subtitle text-Neutral-40"> Gondorejo Gg. I No. 99 </p>
                    </div>
                </div>
                <div class="innerCard">
                    <img src="{{ asset('img/umkm/mie_gobyos.jpg') }}" alt="umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title"> Mie Gobyos </p>
                        <p class="subtitle text-Neutral-40"> Gondorejo Gg. I No. 23 </p>
                    </div>
                </div>
                <div class="innerCard">
                    <img src="{{ asset('img/umkm/tempura.jpg') }}" alt="umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title"> Tempura Mbak Tini </p>
                        <p class="subtitle text-Neutral-40"> Gondorejo Gg. I No. 23 </p>
                    </div>
                </div>
                <div class="innerCard">
                    <img src="{{ asset('img/umkm/tahu_campur.jpg') }}" alt="umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title"> Tahu Campur Lamongan </p>
                        <p class="subtitle text-Neutral-40"> Gondorejo Gg. I No. 11 </p>
                    </div>
                </div>
                <div class="innerCard">
                    <img src="{{ asset('img/umkm/kentang.jpg') }}" alt="umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title"> Rumah Kentang </p>
                        <p class="subtitle text-Neutral-40"> Gondorejo Gg. I No. 40 </p>
                    </div>
                </div>
                <div class="innerCard">
                    <img src="{{ asset('img/umkm/soto.jpg') }}" alt="umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title"> Soto Apartmen </p>
                        <p class="subtitle text-Neutral-40"> Gondorejo Gg. I No. 34 </p>
                    </div>
                </div>
                <div class="innerCard">
                    <img src="{{ asset('img/umkm/nasgor.jpg') }}" alt="umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title"> Nasi Goreng BJR </p>
                        <p class="subtitle text-Neutral-40"> Gondorejo Gg. I No. 21 </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Map --}}
        <section class="py-20 px-12">
            <div class="rounded-xl flex flex-col items-center justify-center w-full">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="820" height="560" id="gmap_canvas" src="https://maps.google.com/maps?q=Perumahan+Gondorejo+Singosari&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.analarmclock.com/">online alarm clock</a><br><a href="https://online.stopwatch-timer.net/"></a><br><style>.mapouter{position: relative;text-align: right;height: 560px;width: 820px;}</style><a href="https://www.mapembed.net">location map</a><style>.gmap_canvas{overflow: hidden;background: none !important;height: 560px;width: 820px;}</style></div></div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="py-20 px-12 md:px-12 lg:px-[60px] justify-between bg-Neutral-100 flex flex-col gap-[60px]">    
            <div class="flex flex-col md:flex-row justify-between items-center gap-20">
                <div class="flex gap-20">
                    <div class="flex flex-col gap-4">
                        <p class="text-Neutral-0 text-xl">
                            Menu
                        </p>
                        <div class="flex flex-col gap-4 text-Neutral-40 text-base text-no">
                            <a href="{{ route('informasi') }}" class="hover:text-Neutral-0">Informasi</a>
                            <a href="{{ route('bansos') }}" class="hover:text-Neutral-0">Bantuan Sosial</a>
                            <a href="{{ route('persuratan') }}" class="hover:text-Neutral-0">Persuratan</a>
                            <a href="{{ route('rt') }}" class="hover:text-Neutral-0">Struktur</a>
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

                <div class="flex flex-col gap-5 items-center md:items-end">
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
                    <p class="text-base font-normal text-center">
                        © Copyright {{now()->year}} Gondorejo. All Right Reserved.
                    </p>
                </div>
            </div>
        </footer>
    </main>
    <script>
        const radioButtons = document.querySelectorAll('input[name="kegiatan"]');
        const image = document.getElementById('kegiatan-image');

        const imageSources = {
            'kegiatan-1': '{{ asset("img/kegiatan/1.jpg") }}',
            'kegiatan-2': '{{ asset("img/kegiatan/2.jpg") }}',
            'kegiatan-3': '{{ asset("img/kegiatan/3.jpg") }}',
            'kegiatan-4': '{{ asset("img/kegiatan/4.jpg") }}',
            'kegiatan-5': '{{ asset("img/kegiatan/5.jpg") }}'
        };

        radioButtons.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.checked) {
                    image.src = imageSources[radio.id];
                }
            });
        });
    </script>
@endsection



{{-- <section class="m-2 p-10 flex flex-col gap-5 rounded-xl border border-Neutral-0 bg-Neutral-0 bg-[url('/public/img/Hero.png')] bg-center bg-cover h-[636px] lg:h-[848px] items-center">
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
</section> --}}


{{-- <div class="bg-[url('img/Hero1.jpg')] h-[730px] w-[659px] rounded-lg"> --}}
                {{-- </div> --}}