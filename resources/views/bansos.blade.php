@extends('layout.template')

@section('content')
    <main class="p-2">
        <div class="outerCard items-center">
            <section class="innerCard mt-20 w-[552]">
                <div class="text-center mb-8">
                    <p class="cardTitle">Cek Data Anda</p>
                    <p class="subtitle text-Neutral-40">Cek data penerima bansos di Dusun Gondorejo.</p>
                </div>

                <form action="#" method="post">
                    <div class="mb-4">
                        <label class="subtitle" for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" placeholder="352xxxxxxxxxxxxx">
                    </div>
                    
                    <div>
                        <p class="subtitle">Tanggal Lahir</p>
                        <div class="mb-3">
                            <select name="tanggal" id="tanggal">Tangal
                                <option value="" class=" text-Neutral-40" >Tanggal</option>
                            </select>
                            <select name="bulan" id="bulan">
                                <option value="" class=" text-Neutral-40" >Bulan</option>
                            </select>
                            <select name="tahun" id="tahun">
                                <option value="" class=" text-Neutral-40" >Tahun</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end mt-12">
                        <a href="#" class="buttonLight mr-2">Ajukan Data</a>
                        <button type="submit" class="buttonDark">Cek Data</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection