@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 flex flex-col gap-2 items-center bg-Neutral-0"> {{-- Outer Card --}}
            <div class="px-4 py-8 flex flex-col gap-8 fadeIn"> {{-- Inner Card --}}
                <p class="cardTitle text-center">Detail Data Warga</p>
                <div class="flex flex-col gap-10 items-center">
                    {{-- Image KTP --}}
                    <div class="flex flex-col justify-center items-center w-fit h-fit px-4 py-8 bg-Neutral-10 border-2 border-Neutral-20 border-dashed rounded-md">
                        <img id="image-preview-kk" src="{{ asset('ktp/' . $warga->nik) . '.png' }}" class="max-w-72 lg:max-w-96 rounded" />
                    </div>

                    <div class="flex flex-col lg:flex-row gap-12 lg:gap-[60px] self-start">
                        <div id="dataWarga" class="flex flex-col gap-4">
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Nama Lengkap</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->nama_warga }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">NIK</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->nik }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Status dalam Keluarga</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->detailKK->statusHubungan->keterangan }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Tempat Lahir</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->tempat_lahir }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Tanggal Lahir</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ Carbon::parse($warga->tanggal_lahir)->translatedFormat('j F Y') }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Jenis Kelamin</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->jenis_kelamin }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Alamat KTP</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->alamat_ktp }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Alamat Domisili</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->alamat_domisili }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Agama</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->agama }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Status Perkawinan</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->alamat_domisili }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Pekerjaan</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $warga->jenisPekerjaan->pekerjaan_nama }}" readonly>
                            </div>
                        </div>
                        <div id="detailWarga" class="flex flex-col gap-4">
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Pendapatan per Bulan</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="Rp {{ $detailWarga->pendapatan }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">Jumlah Kendaraan</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $detailWarga->jumlah_kendaraan }}" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-80 lg:w-full">
                                <label class="detail">BPJS</label>
                                <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $detailWarga->bpjs }}" readonly>
                            </div>
                            @if ($warga->detailKK->hubungan_id == 1)
                                <div class="flex flex-col gap-2 w-80 lg:w-full">
                                    <label class="detail">Luas Bangunan</label>
                                    <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $detailWarga->luas_rumah }} m2" readonly>
                                </div>
                                <div class="flex flex-col gap-2 w-80 lg:w-full">
                                    <label class="detail">Jumlah Tanggungan</label>
                                    <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $detailWarga->jumlah_tanggungan }}" readonly>
                                </div>
                                <div class="flex flex-col gap-2 w-80 lg:w-full">
                                    <label class="detail">Pajak Bumi dan Bangunan</label>
                                    <input type="text" class="w-full lg:w-[450px] font-medium" value="Rp {{ $detailWarga->pbb }}" readonly>
                                </div>
                                <div class="flex flex-col gap-2 w-80 lg:w-full">
                                    <label class="detail">Tagihan Listrik</label>
                                    <input type="text" class="w-full lg:w-[450px] font-medium" value="Rp {{ $detailWarga->tagihan_listrik }}" readonly>
                                </div>
                                <div class="flex flex-col gap-2 w-80 lg:w-full">
                                    <label class="detail">Tagihan Air</label>
                                    <input type="text" class="w-full lg:w-[450px] font-medium" value="Rp {{ $detailWarga->tagihan_air }}" readonly>
                                </div>
                                <div class="flex flex-col gap-2 w-80 lg:w-full">
                                    <label class="detail">Tanggungan Pendidikan</label>
                                    <input type="text" class="w-full lg:w-[450px] font-medium" value="{{ $detailWarga->tanggungan_pendidikan }}" readonly>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection