@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="#" method="post" class="md:w-[480px] p-4 flex flex-col gap-8 rounded-xl border border-Neutral-10 fadeIn">
                <div class="flex flex-col items-center">
                    <p class="cardTitle">Tambah Penerima Bansos</p>
                    <p class="subtitle text-Neutral-40">Pastikan data yang Anda masukkan benar</p>
                </div>

                <div class="flex flex-col p-4 gap-3 bg-Neutral-10 border border-Neutral-20 rounded-lg">
                    <div class="flex justify-between">
                        <div class="flex flex-col items-start">
                            <p class="title">Sal Priyai</p>
                            <p class="text-base text-Neutral-40 ">3527206343440001</p>
                        </div>

                        <div class="flex flex-col items-end">
                            <p class="title">50</p>
                            <p class="text-base text-Neutral-40 ">Total Skor</p>
                        </div>
                    </div>

                    <div class="border border-b border-Neutral-20"></div>

                    <div class="flex justify-between">
                        <div class="flex flex-col items-start">
                            <p class="title">Sal Priyai</p>
                            <p class="text-base text-Neutral-40 ">3527206343440001</p>
                        </div>

                        <div class="flex flex-col items-end">
                            <p class="title">50</p>
                            <p class="text-base text-Neutral-40 ">Total Skor</p>
                        </div>
                    </div>

                    <div class="border border-b border-Neutral-20"></div>

                    <div class="flex justify-between">
                        <div class="flex flex-col items-start">
                            <p class="title">Sal Priyai</p>
                            <p class="text-base text-Neutral-40 ">3527206343440001</p>
                        </div>

                        <div class="flex flex-col items-end">
                            <p class="title">50</p>
                            <p class="text-base text-Neutral-40 ">Total Skor</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="jenis-bansos">Jenis Bantuan Sosial<span class="text-Error-Base">*</span></label>
                    <select name="jenis-bansos" id="jenis-bansos">
                        <option value="" class="text-Neutral-40" disabled selected>Pilih jenis bantuan sosial</option>
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="jenis-bansos">Periode Penerimaan<span class="text-Error-Base">*</span></label>
                    <div class="flex flex-col md:flex-row gap-2">
                        <select name="bulan" id="bulan">
                            <option value="" class="text-Neutral-40" disabled selected>Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>

                        <select name="tahun" id="tahun">
                            <option value="" class=" text-Neutral-40" disabled selected>Tahun</option>
                            @for ($i = now()->year; $i >= 1900; $i--)
                                <option value="{{ $i }}" class=" text-Neutral-40">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row w-full md:justify-end gap-2">
                    <a href="#" class="buttonLight w-full md:w-min">Batal</a>
                    <a href="#" class="buttonDark w-full md:w-min">Simpan</a>
                </div>
            </form>
        </section>
    </main>
@endsection