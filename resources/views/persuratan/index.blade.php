@extends('layout.template')

@section('content')
    <main class="p-2">
        <section class="outerCheckData">
            <form action="#" method="post" class="innerCheckData">
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Persuratan</p>
                        <p class=" text-Neutral-40">Pilih surat sesuai kebutuhan Anda.</p>
                    </div>

                    <div class="flex gap-2 justify-center">
                        <span id="sp"
                            class="bg-Primary-Base text-Neutral-0 font-base px-8 py-3 rounded-full cursor-pointer text-nowrap">
                            Surat Pengantar
                        </span>
                        <span id="sktm"
                            class="bg-Neutral-0 text-Neutral-100 font-base px-8 py-3 rounded-full border border-Neutral-20 cursor-pointer text-nowrap">
                            Surat Tidak Mampu
                        </span>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <label class="subtitle" for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" placeholder="352xxxxxxxxxxxxx">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label class="subtitle">Tanggal Lahir</label>
                            <div class="flex flex-col md:flex-row gap-2">
                                <select name="tanggal" id="tanggal">
                                    <option value="" class=" text-Neutral-40">Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40">{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                <select name="bulan" id="bulan">
                                    <option value="" class=" text-Neutral-40">Bulan</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40">{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                <select name="tahun" id="tahun">
                                    <option value="" class=" text-Neutral-40">Tahun</option>
                                    @for ($i = 1900; $i <= now()->year; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40">{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <div class="flex justify-between items-center">
                                <label class="subtitle" for="tujuan">Tujuan Pengajuan</label>
                                <label class="text-sm font-normal text-Neutral-40">*Opsional, Maks 3</label>
                            </div>
                            <select name="tujuan" id="tujuan">
                                <option value="" class=" text-Neutral-40">Tujuan</option>
                                @for ($i = 1; $i <= 4; $i++)
                                    <option value="{{ $i }}" class=" text-Neutral-40">{{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 md:justify-end">
                    <a href="#" class="buttonDark">Ajukan Surat</a>
                    {{-- <button type="submit" class="buttonDark">Cek Data</button> --}}
                </div>
            </form>
        </section>
    </main>
@endsection
