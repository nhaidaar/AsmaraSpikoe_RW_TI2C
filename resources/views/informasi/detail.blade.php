@extends('layout.template')

@section('content')
    <main class="px-2 py-4 md:p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="outerCard bg-[url('/public/img/detail_informasi_cover.png')] bg-right h-[264px] justify-end">
            <p class="py-2 font-medium text-3xl md:text-4xl text-Neutral-0 text-center">Pengumuman Terkini</p>
        </section>

        <section class="outerCard bg-Neutral-0">
            <div class="px-2 sm:px-20 md:px-40 lg:px-80 flex flex-col gap-6">
                <img src="{{ asset('img/informasi/' . $pengumuman->pengumuman_id . '.png') }}" alt="Pengumuman" class="h-80 w-full flex self-center rounded-lg object-cover">
                <div class="flex flex-col gap-6">
                    <h3 class="text-2xl font-medium text-Neutral-Base">{{ $pengumuman->pengumuman_nama }}</h3>
                    <div class="border-b-2"></div>
                    <p class="text-lg text-Neutral-Base whitespace-pre-line">{{ $pengumuman->pengumuman_detail ? $pengumuman->pengumuman_detail : 'Tidak ada informasi lebih lanjut.' }}</p>
                </div>
            </div>
        </section>

    </main>
@endsection