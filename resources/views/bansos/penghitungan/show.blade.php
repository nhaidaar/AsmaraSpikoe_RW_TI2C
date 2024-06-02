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
                            <p class="p-4 gap-4 border border-Neutral-20 rounded-lg text-base md:text-lg text-Neutral-40 font-normal">Sal Priyai</p>
                        </div>

                        <div class="flex flex-col gap-3">
                            <p class="text-base md:text-lg font-medium">NIK<span class="text-Error-Base">*</span></p>
                            <p class="p-4 gap-4 border border-Neutral-20 rounded-lg text-base md:text-lg text-Neutral-40 font-normal">3527206343440001</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <p class="text-base md:text-lg font-medium text-center">Data Perhitungan</p>

                    <div class="flex flex-col p-4 gap-3 border border-Neutral-20 rounded-lg">
                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">Pendapatan per Bulan</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 1</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>

                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">Jumlah Kendaraan</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 2</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>

                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">BPJS</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 3</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>

                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">Luas Bangunan</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 4</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>
                        
                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">Jumlah Tanggungan</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 5</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>
                        
                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">Pajak Bumi & Bangunan</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 6</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>

                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">Tagihan Listrik</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 7</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>

                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">Tagihan Air</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 8</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>

                        <div class="flex justify-between">
                            <div class="flex flex-col items-start">
                                <p class="text-base md:text-lg font-medium">Tanggungan Pendidikan</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Kriteria 9</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-base md:text-lg font-medium">50</p>
                                <p class="text-base md:text-lg text-Neutral-40 font-normal ">Skor</p>
                            </div>
                        </div>
    
                        <div class="border border-b border-Neutral-20"></div>

                        <div class="flex justify-between py-2">
                            <div class="flex flex-col items-start">
                                <p class="text-xl md:text-2xl font-semibold">Tanggungan Pendidikan</p>
                            </div>
    
                            <div class="flex flex-col items-end">
                                <p class="text-xl md:text-2xl font-semibold">50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection