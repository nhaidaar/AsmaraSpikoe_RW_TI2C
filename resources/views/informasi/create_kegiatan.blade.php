@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('storeKegiatan') }}" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10">
                @csrf

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Tambahkan Kegiatan</p>
                        <p class="subsubtitle text-Neutral-40 text-nowrap">Tambah informasi kegiatan sesuai yang diinginkan.</p>
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
                    
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama <span class="text-Error-Base">*</span></label>
                            <input type="text" name="nama" id="nama" placeholder="Masukkan nama" value="{{ old('nama') }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tanggal">Tanggal <span class="text-Error-Base">*</span></label>
                            <div class="flex flex-col md:flex-row gap-2">
                                <select name="tanggal" id="tanggal">
                                    <option value="" class=" text-Neutral-40" disabled selected>Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40" >{{ $i }}</option>
                                    @endfor
                                </select>
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
                                    @for ($i = now()->year; $i <= (now()->year + 5); $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="waktu">Waktu <span class="text-Error-Base">*</span></label>
                            <div class="flex flex-row gap-4 items-center font-medium">
                                <div class="flex flex-row gap-1 items-end">
                                    <select name="jam" id="jam">
                                        @for ($i = 0; $i <= 23; $i++)
                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" class=" text-Neutral-40" >{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                    .
                                    <select name="menit" id="menit">
                                        @for ($i = 0; $i <= 59; $i++)
                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" class=" text-Neutral-40" >{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                WIB
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tempat">Tempat <span class="text-Error-Base">*</span></label>
                            <input type="text" name="tempat" id="tempat" placeholder="Masukkan tempat" value="{{ old('tempat') }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 md:justify-end">
                    <a href="{{ route('informasi') }}" class="buttonLight w-full md:w-min">Batal</a>
                    <button type="submit" class="buttonDark w-full md:w-min">Tambahkan</button>
                </div>
            </form>
        </section>
    </main>
@endsection