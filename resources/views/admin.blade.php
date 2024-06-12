@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="outerCard">
            <div class="flex flex-col gap-2">
                <p class="title">Selamat Datang, Ketua {{ Auth::user()->level == 'rw' ? 'RW' : 'RT' }} 👋🏻</p>
                <p class="subsubtitle text-Neutral-40">Cek semua Data Penduduk, Bansos dan Laporan Keuangan.</p>
            </div>
        </section>
        <section class="outerCard">
            <p class="cardTitle">Data Penduduk</p>
            <div class="h-[1px] bg-Neutral-20 flex"></div>
            <div class="flex w-full justify-center overflow-auto">
                <iframe width="900" height="600" src="https://lookerstudio.google.com/embed/reporting/177b3bcc-1588-43db-a542-0117833d4c3f/page/KAv2D" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
            </div>
        </section>
        <section class="outerCard">
            <p class="cardTitle">Data Persuratan</p>
            <div class="h-[1px] bg-Neutral-20 flex"></div>
            <div class="flex w-full justify-center overflow-auto">
                <iframe width="900" height="600" src="https://lookerstudio.google.com/embed/reporting/b8a25dc5-02d3-4727-a077-396434910659/page/X712D" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
            </div>
        </section>
        <section class="outerCard">
            <p class="cardTitle">Data Keuangan</p>
            <div class="h-[1px] bg-Neutral-20 flex"></div>
            <div class="flex w-full justify-center overflow-auto">
                <iframe width="900" height="600" src="https://lookerstudio.google.com/embed/reporting/362261b5-5ee4-4b40-bc7c-83d6c94f70d7/page/Y812D" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
            </div>
        </section>
    </main>
@endsection
