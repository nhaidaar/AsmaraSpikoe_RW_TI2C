@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-4 lg:p-8 lg:px-80 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <div class="flex flex-col w-full p-4 gap-8 border border-Neutral-20 rounded-xl">
                <p class="cardTitle text-center">Detail Penilaian</p>
                
                <div class="flex flex-col gap-2">
                    <p class="text-base md:text-lg font-medium">Data Warga</p>

                    <div class="flex flex-col p-4 gap-4 border border-Neutral-20 rounded-lg">
                        <div class="flex flex-col gap-3">
                            <p class="text-base md:text-lg font-medium">Nama<span class="text-Error-Base">*</span></p>
                            <p class="p-4 gap-4 border border-Neutral-20 rounded-lg text-base md:text-lg text-Neutral-40 font-normal">{{ $maut->warga->nama_warga }}</p>
                        </div>

                        <div class="flex flex-col gap-3">
                            <p class="text-base md:text-lg font-medium">NIK<span class="text-Error-Base">*</span></p>
                            <p class="p-4 gap-4 border border-Neutral-20 rounded-lg text-base md:text-lg text-Neutral-40 font-normal">{{ $maut->warga->nik }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <p class="text-base md:text-lg font-medium text-center">Data Perhitungan</p>

                    <div class="flex flex-col p-4 gap-3 border border-Neutral-20 rounded-lg">
                        @foreach ($maut->detailMaut as $item)
                            
                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">{{ $item->kriteria->keterangan }}</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal">Kriteria {{ $loop->iteration }}</p>
                            </div>
                            
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">{{ $item->kriteria_skor }}</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal">Skor</p>
                            </div>
                        </div>
                        
                        <div class="border-[0.25px] border-b-[0.5px] border-Neutral-20"></div>
                        @endforeach

                        <div class="flex justify-between py-2">
                            <div class="flex flex-col items-start">
                                <p class="text-xl md:text-2xl font-semibold">Total Skor</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-xl md:text-2xl font-semibold">{{ $maut->skor_akhir }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection