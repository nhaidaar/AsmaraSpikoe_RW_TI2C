@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0"> {{-- Outer Card --}}
            <div class="p-4 flex flex-col gap-12 rounded-xl border border-Neutral-20 fadeIn"> {{-- Inner Card --}}
                <p class="cardTitle text-center">Detail Kartu Keluarga</p>
                <div class="flex flex-col gap-10 items-center">
                    <div class="flex flex-col gap-8 lg:gap-12">
                        {{-- Kartu Keluarga --}}

                        <section class="flex flex-col gap-2 lg:w-[664px] sm:w-[442px]">
                            <label>Kartu Keluarga (KK)</label>
                            <div class="p-4 flex flex-col gap-4 rounded-lg border border-Neutral-20">
                                <div class="flex flex-col gap-3">
                                    <label class="detail">Foto KK</label>
                                    <div class="flex flex-col justify-center items-center px-4 py-8 bg-Neutral-10 border-2 border-Neutral-20 border-dashed rounded-md">
                                        <img id="image-preview-kk" src="{{ asset('kk/' . $kk->no_kk) . '.png' }}" class="max-w-72 lg:max-w-96 rounded" />
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <label class="detail">No. KK</label>
                                    <input type="text" class="font-medium" value="{{ $kk->no_kk }}" readonly>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <label class="detail">Domisili</label>
                                    <div class="flex gap-3 font-medium">
                                        <input type="text" class="font-medium" value="RT 0{{ $kk->rt }}" readonly>
                                        <input type="text" class="font-medium" value="RW 04" disabled>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- Anggota Keluarga --}}
                        @foreach ($anggota as $item)
                            <section class="flex flex-col gap-2 lg:w-[664px] sm:w-[442px]">
                                <label>{{ $item->detailKK->statusHubungan->keterangan }}</label>
                                <div class="p-4 flex flex-col gap-6 rounded-lg border border-Neutral-20">
                                    <div class="flex flex-col gap-4">
                                        <div class="flex flex-col gap-3">
                                            <label class="detail">Nama</label>
                                            <input type="text" class="font-medium" value="{{ $item->nama_warga }}" readonly>
                                        </div>
                                        
                                        <div class="flex flex-col gap-3">
                                            <label class="detail">NIK</label>
                                            <input type="text" class="font-medium" value="{{ $item->nik }}" readonly>
                                        </div>
                                    </div>

                                    <a href="{{ route('detailWarga', $item->warga_id) }}" class="buttonDark sm:w-min">Detail</a>
                                </div>
                            </section>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection