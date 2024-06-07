@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('storeKeuangan') }}" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10">
                @csrf

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Tambahkan Transaksi</p>
                        <p class="subsubtitle text-Neutral-40 text-nowrap">Tambah transaksi sesuai yang diinginkan.</p>
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

                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-2">
                            <label for="rt_id">
                                Domisili<span class="text-Error-Base">*</span>
                            </label>
                            <div class="flex gap-3 font-medium">
                                <select name="rt_id" id="rt_id">
                                    @for ($i = 1; $i <= 7; $i++)
                                        <option value="{{ $i }}" {{ Auth::user()->level == 'rt' && $rt == $i ? 'selected' : '' }} {{ Auth::user()->level == 'rt' && $rt != $i ? 'disabled' : '' }}>RT 0{{$i}}</option>
                                    @endfor
                                </select>
                                <select name="rw_id" id="rw_id" disabled>
                                    <option value="" selected>RW 04</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="tanggal">Tanggal<span class="text-Error-Base">*</span></label>
                            <div class="flex flex-col md:flex-row gap-2">
                                <select name="tanggal" id="tanggal">
                                    <option value="" class=" text-Neutral-40" disabled selected>Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" {{ old('tanggal') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
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
                                    @for ($i = now()->year; $i > (now()->year - 10); $i--)
                                        <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis">Jenis<span class="text-Error-Base">*</span></label>
                            <div class="flex gap-2 justify-center text-center">
                                <div class="flex w-full">
                                    <input type="radio" name="jenis_keuangan" value="Pemasukkan" id="Pemasukkan" class="hidden peer" {{ old('jenis_keuangan') == 'Pemasukkan' || old('jenis_keuangan') == null ? 'checked' : '' }}>
                                    <label for="Pemasukkan" id="label-Pemasukkan" class="bg-Neutral-0 peer-checked:bg-Additional-Base text-Neutral-100 peer-checked:text-Neutral-0 font-normal lg:text-lg p-3 rounded-lg cursor-pointer text-nowrap w-full border-2 border-Neutral-10 peer-checked:border-transparent">Pemasukkan</label>
                                </div>
                                <div class="flex w-full">
                                    <input type="radio" name="jenis_keuangan" value="Pengeluaran" id="Pengeluaran" class="hidden peer" {{ old('jenis_keuangan') == 'Pengeluaran' ? 'checked' : '' }}>
                                    <label for="Pengeluaran" id="label-Pengeluaran" class="bg-Neutral-0 peer-checked:bg-Additional-Base text-Neutral-100 peer-checked:text-Neutral-0 font-normal lg:text-lg p-3 rounded-lg cursor-pointer text-nowrap w-full border-2 border-Neutral-10 peer-checked:border-transparent">Pengeluaran</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col gap-2">
                            <label for="tempat">Nominal<span class="text-Error-Base">*</span></label>
                            <div class="flex gap-2 items-center">
                                <span class="p-4">Rp</span>
                                <input type="text" name="nominal" id="nominal" placeholder="10.000" value="{{ old('nominal') }}">
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tempat">Keterangan<span class="text-Error-Base">*</span></label>
                            <input type="text" name="keterangan_keuangan" id="keterangan_keuangan" placeholder="Masukkan keterangan" value="{{ old('keterangan_keuangan') }}">
                        </div>

                        <label class="text-Error-Base text-sm font-normal">
                            <ul class="list-disc pl-4">
                                <li>Mohon mengisi data dengan benar.</li>
                                <li>Data yang telah ditambahkan tidak bisa diubah kembali</li>
                            </ul>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 md:justify-end">
                    <a href="{{ route('keuangan') }}" class="buttonLight w-full md:w-min">Batal</a>
                    <button type="submit" class="buttonDark w-full md:w-min">Tambahkan</button>
                </div>
            </form>
        </section>
    </main>
@endsection