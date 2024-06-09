@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 bg-Neutral-0 items-center">
            <form action="{{ route('storePerhitungan') }}" method="post" class="p-4 flex flex-col gap-8 justify-between md:justify-normal rounded-xl border border-Neutral-10 md:w-[480px] h-lvh md:h-fit self-center fadeIn">
                @csrf

                <input type="hidden" name="maut_id" value="{{ $maut->maut_id }}">
                <input type="hidden" name="warga_id" value="{{ $maut->warga->warga_id }}">
                <div class="flex flex-col gap-1 items-center">
                    <p class="cardTitle">Tambah Penerima Bansos</p>
                    <p class="subtitle text-Neutral-40">Pastikan data yang Anda masukkan benar</p>
                </div>

                @if ($errors->any())
                <div class="p-3 md:p-4 flex gap-1.5 md:gap-2.5 bg-Error-10 border border-Error-20 rounded-lg items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <g clip-path="url(#a)">
                            <path stroke="#C04949" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12a9 9 0 1 0 18.001 0A9 9 0 0 0 3 12Zm9-3h.01"/>
                            <path stroke="#C04949" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 12h1v4h1"/>
                        </g>
                        <defs>
                            <clipPath id="a"><path fill="#fff" d="M0 0h24v24H0z"/></clipPath>
                        </defs>
                    </svg>
                    <p class="font-medium text-sm md:text-base text-Error-Base">{{ $errors->first() }}</p>
                </div>
                @endif

                <div class="flex flex-col p-4 bg-Neutral-10 border border-Neutral-20 rounded-lg">
                    <div class="flex justify-between">
                        <div class="flex flex-col items-start">
                            <p class="title">{{ $maut->warga->nama_warga }}</p>
                            <p class="text-base text-Neutral-40">{{ $maut->warga->nik }}</p>
                        </div>

                        <div class="flex flex-col items-end">
                            <p class="title">{{ round($maut->skor_akhir, 3) }}</p>
                            <p class="text-base text-Neutral-40">Total Skor</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="bansos_id">Jenis Bantuan Sosial<span class="text-Error-Base">*</span></label>
                    <select name="bansos_id" id="bansos_id">
                        <option value="" class="text-Neutral-40" disabled selected>Pilih jenis bantuan sosial</option>
                        @foreach ($bansos as $item)
                            <option value="{{ $item->bansos_id }}" {{ old('bansos_id') == $item->bansos_id ? 'selected' : '' }}>{{ $item->bansos_nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="jenis-bansos">Periode Penerimaan<span class="text-Error-Base">*</span></label>
                    <div class="flex flex-col md:flex-row gap-2">
                        <select name="bulan" id="bulan">
                            <option value="" class="text-Neutral-40" disabled selected>Bulan</option>
                            <option value="1" {{ old('bulan') == 1 ? 'selected' : '' }}>Januari</option>
                            <option value="2" {{ old('bulan') == 2 ? 'selected' : '' }}>Februari</option>
                            <option value="3" {{ old('bulan') == 3 ? 'selected' : '' }}>Maret</option>
                            <option value="4" {{ old('bulan') == 4 ? 'selected' : '' }}>April</option>
                            <option value="5" {{ old('bulan') == 5 ? 'selected' : '' }}>Mei</option>
                            <option value="6" {{ old('bulan') == 6 ? 'selected' : '' }}>Juni</option>
                            <option value="7" {{ old('bulan') == 7 ? 'selected' : '' }}>Juli</option>
                            <option value="8" {{ old('bulan') == 8 ? 'selected' : '' }}>Agustus</option>
                            <option value="9" {{ old('bulan') == 9 ? 'selected' : '' }}>September</option>
                            <option value="10" {{ old('bulan') == 10 ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ old('bulan') == 11 ? 'selected' : '' }}>November</option>
                            <option value="12" {{ old('bulan') == 12 ? 'selected' : '' }}>Desember</option>
                        </select>

                        <select name="tahun" id="tahun">
                            <option value="" class=" text-Neutral-40" disabled selected>Tahun</option>
                            @for ($i = now()->year; $i <= (now()->year) + 5; $i++)
                                <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row w-full md:justify-end gap-2">
                    <a href="{{ route('indexPerhitunganBansos') }}" class="buttonLight w-full md:w-min">Batal</a>
                    <button type="submit" class="buttonDark w-full md:w-min">Simpan</button>
                </div>
            </form>
        </section>
    </main>
@endsection