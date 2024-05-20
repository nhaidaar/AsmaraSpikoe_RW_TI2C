@extends('admin.layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0 h-[calc(86vh)]">
            <form action="/bansos" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10">
                @csrf

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Tambahkan Informasi</p>
                        <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">Tambah informasi  sesuai yang diinginkan.</p>
                    </div>
                    
                    
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="Masukkan nama" value="{{ old('nama') }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" name="tanggal" id="tanggal" placeholder="Masukkan tanggal" value="{{ old('tanggal') }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="waktu">Waktu</label>
                            <input type="text" name="waktu" id="waktu" placeholder="Masukkan waktu" value="{{ old('waktu') }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tempat">Tempat</label>
                            <input type="text" name="tempat" id="tempat" placeholder="Masukkan tempat" value="{{ old('tempat') }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 md:justify-end">
                    <a href="#" class="buttonLight">Batal</a>
                    <button type="submit" class="buttonDark">Tambahkan</button>
                </div>
            </form>
        </section>
    </main>
@endsection