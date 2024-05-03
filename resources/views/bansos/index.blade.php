@extends('layout.template')

@section('content')
    <main class="p-2">
        <section class="outerCheckData">
            <form action="#" method="post" class="innerCheckData">
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Cek Data Anda</p>
                        <p class=" text-Neutral-40">Cek data penerima bansos di Dusun Gondorejo.</p>
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
                                    <option value="" class=" text-Neutral-40" >Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40" >{{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="bulan" id="bulan">
                                    <option value="" class=" text-Neutral-40" >Bulan</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40" >{{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="tahun" id="tahun">
                                    <option value="" class=" text-Neutral-40" >Tahun</option>
                                    @for ($i = 1900; $i <= now()->year; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40" >{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 md:justify-end">
                    <a href="#" class="buttonLight">Ajukan Data</a>
                    <button type="submit" class="buttonDark">Cek Data</button>
                </div>
            </form>
        </section>
    </main>
@endsection