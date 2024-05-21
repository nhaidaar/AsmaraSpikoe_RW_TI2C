@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('storeKegiatan') }}" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10">
                @csrf

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Tambahkan Kegiatan</p>
                        <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">Tambah informasi kegiatan sesuai yang diinginkan.</p>
                    </div>
                    
                    
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="Masukkan nama" value="{{ old('nama') }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tanggal">Tanggal</label>
                            <div class="flex flex-col md:flex-row gap-2">
                                <select name="tanggal" id="tanggal">
                                    <option value="" class=" text-Neutral-40" disabled selected>Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40" >{{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="bulan" id="bulan">
                                    <option value="" class="text-Neutral-40" disabled selected>Bulan</option>
                                    <option value="1" class="text-Neutral-40">Januari</option>
                                    <option value="2" class="text-Neutral-40">Februari</option>
                                    <option value="3" class="text-Neutral-40">Maret</option>
                                    <option value="4" class="text-Neutral-40">April</option>
                                    <option value="5" class="text-Neutral-40">Mei</option>
                                    <option value="6" class="text-Neutral-40">Juni</option>
                                    <option value="7" class="text-Neutral-40">Juli</option>
                                    <option value="8" class="text-Neutral-40">Agustus</option>
                                    <option value="9" class="text-Neutral-40">September</option>
                                    <option value="10" class="text-Neutral-40">Oktober</option>
                                    <option value="11" class="text-Neutral-40">November</option>
                                    <option value="12" class="text-Neutral-40">Desember</option>
                                </select>
                                <select name="tahun" id="tahun">
                                    <option value="" class=" text-Neutral-40" disabled selected>Tahun</option>
                                    @for ($i = now()->year; $i >= 1900; $i--)
                                        <option value="{{ $i }}" class=" text-Neutral-40">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="waktu">Waktu</label>
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
                            <label for="tempat">Tempat</label>
                            <input type="text" name="tempat" id="tempat" placeholder="Masukkan tempat" value="{{ old('tempat') }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 md:justify-end">
                    <a href="{{ route('informasi') }}" class="buttonLight">Batal</a>
                    <button type="submit" class="buttonDark">Tambahkan</button>
                </div>
            </form>
        </section>
    </main>
@endsection