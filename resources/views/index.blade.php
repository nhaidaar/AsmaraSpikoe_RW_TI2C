@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@extends('layout.template')

@section('content')
    <main class="bg-Neutral-0">

        {{-- Header --}}
        <section class="m-3">
            <div class="flex justify-between bg-Neutral-10 rounded-xl">

                {{-- Kiri --}}
                <div class="flex flex-col justify-between gap-12 p-6 md:p-10">
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

                        <div class="flex gap-2">
                            <a href="{{ route('bansos') }}" class="bg-Primary-Base w-min rounded-lg py-3 px-4 font-normal text-base md:text-lg text-Neutral-0 text-center text-nowrap">
                                Cek Bansos
                            </a>
                            <a href="{{ route('persuratan') }}" class="bg-Neutral-0 w-min rounded-lg py-3 px-4 font-normal text-base md:text-lg text-Neutral-Base text-center text-nowrap">
                                Ajukan Surat
                            </a>
                        </div>
                    </div>

                    <div class="bg-Neutral-10 flex gap-8 md:gap-16">
                        <div class="flex flex-col gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48"><g clip-path="url(#a)"><path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 26a4 4 0 1 0 8 0 4 4 0 0 0-8 0Zm-4 16v-2a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v2m-2-32a4 4 0 1 0 8 0 4 4 0 0 0-8 0Zm4 10h4a4 4 0 0 1 4 4v2M10 10a4 4 0 1 0 8 0 4 4 0 0 0-8 0ZM6 26v-2a4 4 0 0 1 4-4h4"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h48v48H0z"/></clipPath></defs></svg>
                            <div class="flex flex-col gap-1">
                                <p class="text-Neutral-base text-3xl font-medium">{{ $keluarga }}</p>
                                <p class="text-Neutral-40 text-base font-normal">Jumlah keluarga</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48"><g clip-path="url(#a)"><path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M16 14a8 8 0 1 0 16.001 0A8 8 0 0 0 16 14Zm-4 28v-4a8 8 0 0 1 8-8h8a8 8 0 0 1 8 8v4"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h48v48H0z"/></clipPath></defs></svg>                              
                            <div class="flex flex-col gap-1">
                                <p class="text-Neutral-base text-3xl font-medium">{{ $wargaAktif }}</p>
                                <p class="text-Neutral-40 text-base font-normal">Jumlah warga</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48"><g clip-path="url(#a)"><path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M16.36 16.379a8.02 8.02 0 0 0 5.231 5.254m7.014-1.09a8 8 0 1 0-11.18-11.104M12 42v-4a8 8 0 0 1 8-8h8c.824 0 1.62.124 2.366.356m5.266 5.236c.24.76.368 1.57.368 2.408v4M6 6l36 36"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h48v48H0z"/></clipPath></defs></svg>                              
                            <div class="flex flex-col gap-1">
                                <p class="text-Neutral-base text-3xl font-medium">{{ $wargaTidakAktif }}</p>
                                <p class="text-Neutral-40 text-base font-normal">Jumlah warga tidak aktif</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kanan --}}
                <div class="flex rounded-lg max-h-[730px]">
                    <div class="p-3 hidden md:flex">
                        <img src="{{ asset('img/hero1.png') }}" alt="Hero" class="rounded-xl object-cover">
                    </div>
                </div>                
            </div>
        </section>

        {{-- Tentang --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-5">
            <div class="flex gap-2 items-center">
                <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                <p class="font-medium text-base text-Neutral-Base">TENTANG</p>
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
                    <p class="font-medium text-base text-Neutral-Base">PENGUMUMAN TERKINI</p>
                </div>
        
                <div class="flex flex-col lg:flex-row gap-8 lg:items-center justify-between">
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

            <a href="{{ route('informasi') }}" class="buttonDark w-min">Lihat Semua</a>
        </section>
        
        {{-- Kegiatan Warga --}}
        <section class="py-12 md:py-16 lg:py-20 px-8 md:px-12 lg:px-[60px] bg-Neutral-0 flex flex-col gap-12">
            <div class="flex flex-col gap-5">
                <div class="flex gap-2 items-center">
                    <div class="w-2 h-2 bg-[#302CF7] rounded-full"></div>
                    <p class="font-medium text-base text-Neutral-Base">KEGIATAN WARGA</p>
                </div>
        
                <div class="flex flex-col lg:flex-row gap-8 lg:items-center justify-between">
                    <p class="font-normal text-3xl md:text-4xl lg:text-5xl text-Neutral-Base max-w-[570px]">
                        Rangkaian Kegiatan Tahunan Desa Gondorejo.
                    </p>

                    <p class="font-normal text-base text-Neutral-40">
                        Jangan lupa untuk datang dan berpartisipasi dalam rangkaian kegiatan tahunan Desa Gondorejo. Ikutilah keseruan dalam kegiatan keagamaan, kemerdekaan dan lainnya.
                    </p>
                </div>
            </div>

            <div class="flex flex-col gap-8 md:flex-row justify-between items-center">
                <div class="flex flex-col gap-2 w-full md:w-[520px]">
                    @php
                        $kegiatan = [
                            'Peringatan Hari Kemerdekaan Indonesia',
                            'Maulid Nabi',
                            'Pengajian Akbar',
                            'Karnaval',
                            'Bantengan'
                    ];
                    @endphp
                    @foreach ($kegiatan as $key => $value)
                    <div>
                        <input type="radio" id="kegiatan{{$key + 1}}" name="kegiatan" class="hidden peer" {{ $key == 0 ? 'checked' : ''}}>
                            <label for="kegiatan{{$key + 1}}" class="flex items-center p-6 text-Neutral-40 border border-Neutral-10 rounded-xl peer-checked:border-Primary-30 peer-checked:text-Neutral-Base peer-checked:outline peer-checked:outline-4 peer-checked:outline-Primary-10">
                                <p class="text-xl font-normal">{{ $value }}</p>
                            </label>
                        </input>
                    </div>
                    @endforeach
                </div>

                <img id="kegiatan-image" src="{{ asset('img/kegiatan/kegiatan1.png') }}" alt="Kegiatan" class="bg-Neutral-10 h-[442px] w-full md:w-[60%] flex self-center rounded-xl object-cover">
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
                    <p class="font-medium text-base text-Neutral-Base">UMKM</p>
                </div>
        
                <div class="flex flex-col lg:flex-row gap-8 lg:items-center justify-between">
                    <p class="font-normal text-3xl md:text-4xl lg:text-5xl text-Neutral-Base">
                        Jelajahi Ragam Hidangan dari UMKM Lokal.
                    </p>

                    <p class="font-normal text-base text-Neutral-40">
                        Temukan berbagai hidangan lezat yang dibuat dengan resep tradisional dan bahan-bahan segar pilihan. Buat lidah perutmu jadi manja dengan berbagai pilihan kuliner di Gondorejo.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 justify-between gap-3">
                @foreach ($umkm as $item)
                <a href="{{ $item->umkm_link }}" class="innerCard">
                    <img src="{{ asset('img/umkm/' . $item->umkm_id . '.png') }}" alt="Umkm" class="h-56 w-full flex self-center rounded-xl object-cover">
                    <div class="p-1 flex flex-col gap-1">
                        <p class="title">{{ $item->umkm_nama }}</p>
                        <p class="subtitle text-Neutral-40">{{ $item->umkm_alamat }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </section>

        {{-- Map --}}
        <div class="p-12 md:p-16 lg:p-20 bg-Neutral-0 flex flex-col gap-12 items-center">    
            <a href="https://maps.app.goo.gl/7NxRQxVidyJV8Toa9" class="bg-Primary-Base w-min rounded-lg py-4 px-8 font-normal text-lg md:text-xl text-Neutral-0 text-center text-nowrap">
                Kunjungi <span class="font-semibold">Gondorejo</span>
            </a>
        </div>
        {{-- <section class="py-20 px-12"> --}}
            {{-- <div class="rounded-xl flex flex-col items-center justify-center w-full"> --}}
                {{-- <div class="mapouter"><div class="gmap_canvas"><iframe width="820" height="560" id="gmap_canvas" src="https://maps.google.com/maps?q=Perumahan+Gondorejo+Singosari&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.analarmclock.com/">online alarm clock</a><br><a href="https://online.stopwatch-timer.net/"></a><br><style>.mapouter{position: relative;text-align: right;height: 560px;width: 820px;}</style><a href="https://www.mapembed.net">location map</a><style>.gmap_canvas{overflow: hidden;background: none !important;height: 560px;width: 820px;}</style></div></div> --}}
            {{-- </div> --}}
        {{-- </section> --}}

        {{-- Footer --}}
        <footer class="py-20 px-12 md:px-12 lg:px-[60px] justify-between bg-Neutral-100 flex flex-col gap-[60px]">    
            <div class="flex flex-col md:flex-row justify-between items-center gap-20">
                <div class="flex gap-20">
                    <div class="flex flex-col gap-4">
                        <p class="text-Neutral-0 text-xl">Menu</p>
                        <div class="flex flex-col gap-4 text-Neutral-40 text-base text-no">
                            <a href="{{ route('informasi') }}" class="hover:text-Neutral-0">Informasi</a>
                            <a href="{{ route('bansos') }}" class="hover:text-Neutral-0">Bantuan Sosial</a>
                            <a href="{{ route('persuratan') }}" class="hover:text-Neutral-0">Persuratan</a>
                            <a href="{{ route('rt') }}" class="hover:text-Neutral-0">Struktur</a>
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <p class="text-Neutral-0 text-xl">Kontributor</p>
                        <div class="flex flex-col gap-4 text-Neutral-40 text-base">
                            <a href="https://www.linkedin.com/in/chyntia-santi/" class="hover:text-Neutral-0">Chyntia Santi Nur Trisnawati</a>
                            <a href="https://www.linkedin.com/in/ahmad-khoirul-falah/" class="hover:text-Neutral-0">Ahmad Khoirul Falah</a>
                            <a href="https://www.linkedin.com/in/irsyaddani/" class="hover:text-Neutral-0">Irsyad Danisaputra</a>
                            <a href="https://www.linkedin.com/in/nhaidaar/" class="hover:text-Neutral-0">Muhammad Naufal Haidar S.</a>
                            <a href="https://www.linkedin.com/in/rayyanalfirdausi/" class="hover:text-Neutral-0">Rayyan Al Firdausi</a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-5 items-center md:items-end">
                    <div class="text-Neutral-40">Supported By</div>
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
                    image.src = `{{ asset('img/kegiatan/') }}/${radio.id}.png`;
                }
            });
        });
    </script>
@endsection