@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('updateKegiatan', $kegiatan->kegiatan_id) }}" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10">
                @csrf
                {!! method_field('PUT') !!}

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Tambahkan Kegiatan</p>
                        <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">Tambah informasi kegiatan sesuai yang diinginkan.</p>
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
                            <input type="text" name="nama" id="nama" placeholder="Masukkan nama" value="{{ $kegiatan->kegiatan_nama }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tanggal">Tanggal <span class="text-Error-Base">*</span></label>
                            <div class="flex flex-col md:flex-row gap-2">
                                <select name="tanggal" id="tanggal">
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40" {{ date('d', strtotime($kegiatan->tanggal_waktu)) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="bulan" id="bulan">
                                    <option value="1" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 1 ? 'selected' : '' }}>Januari</option>
                                    <option value="2" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 2 ? 'selected' : '' }}>Februari</option>
                                    <option value="3" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 3 ? 'selected' : '' }}>Maret</option>
                                    <option value="4" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 4 ? 'selected' : '' }}>April</option>
                                    <option value="5" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 5 ? 'selected' : '' }}>Mei</option>
                                    <option value="6" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 6 ? 'selected' : '' }}>Juni</option>
                                    <option value="7" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 7 ? 'selected' : '' }}>Juli</option>
                                    <option value="8" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 8 ? 'selected' : '' }}>Agustus</option>
                                    <option value="9" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 9 ? 'selected' : '' }}>September</option>
                                    <option value="10" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 10 ? 'selected' : '' }}>Oktober</option>
                                    <option value="11" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 11 ? 'selected' : '' }}>November</option>
                                    <option value="12" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == 12 ? 'selected' : '' }}>Desember</option>
                                </select>
                                <select name="tahun" id="tahun">
                                    @for ($i = now()->year; $i <= (now()->year + 5); $i++)
                                        <option value="{{ $i }}" class="text-Neutral-40" {{ date('m', strtotime($kegiatan->tanggal_waktu)) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="waktu">Waktu <span class="text-Error-Base">*</span></label>
                            <div class="flex flex-row gap-4 items-center font-medium">
                                <div class="flex flex-row gap-1 items-center">
                                    <select name="jam" id="jam">
                                        @for ($i = 0; $i <= 23; $i++)
                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" class=" text-Neutral-40" {{ date('H', strtotime($kegiatan->tanggal_waktu)) == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                    <p>.</p>
                                    <select name="menit" id="menit">
                                        @for ($i = 0; $i <= 59; $i++)
                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" class=" text-Neutral-40" {{ date('i', strtotime($kegiatan->tanggal_waktu)) == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                WIB
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tempat">Tempat <span class="text-Error-Base">*</span></label>
                            <input type="text" name="tempat" id="tempat" placeholder="Masukkan tempat" value="{{ $kegiatan->kegiatan_lokasi }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 md:justify-end">
                    <a href="{{ route('informasi') }}" class="buttonLight md:w-min">Batal</a>
                    <button type="submit" class="buttonDark md:w-min">Tambahkan</button>
                </div>
            </form>
        </section>
    </main>
@endsection