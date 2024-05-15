@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0 h-full">
            <form action="persuratan" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10">
                @csrf
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Persuratan</p>
                        <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">Pilih surat sesuai kebutuhan Anda.</p>
                    </div>

                    <div class="flex gap-2 justify-center text-center">
                        <div class="flex w-full">
                            <input type="radio" name="jenis" value="sp" id="sp" class="hidden peer" checked>
                            <label onclick="toggleTujuan()" for="sp" id="label-sp" class="bg-Neutral-0 peer-checked:bg-Primary-Base text-Neutral-100 peer-checked:text-Neutral-0 font-medium text-sm md:text-base px-3 md:px-4 py-3 md:py-4 rounded-full cursor-pointer text-nowrap md:w-full border-2 border-Neutral-10 peer-checked:border-transparent">Surat Pengantar</label>
                        </div>
                        <div class="flex w-full">
                            <input type="radio" name="jenis" value="sktm" id="sktm" class="hidden peer">
                            <label onclick="toggleTujuan()" for="sktm" id="label-sktm" class="bg-Neutral-0 peer-checked:bg-Primary-Base text-Neutral-100 peer-checked:text-Neutral-0 font-medium text-sm md:text-base px-3 md:px-4 py-3 md:py-4 rounded-full cursor-pointer text-nowrap md:w-full border-2 border-Neutral-10 peer-checked:border-transparent">Surat Tidak Mampu</label>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" placeholder="352xxxxxxxxxxxxx">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label>Tanggal Lahir</label>
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
                        <div id="tujuanField" class="flex flex-col gap-1">
                            <div class="flex justify-between items-center">
                                <label for="tujuan">Tujuan Pengajuan</label>
                                <label class="text-xs md:text-sm font-normal text-Neutral-40">*Opsional, Maks 3</label>
                            </div>
                            <select name="tujuan" id="tujuan">
                                <option value="" class="text-Neutral-40" disabled selected>Tujuan</option>
                                @for ($i = 1; $i <= 4; $i++)
                                    <option value="{{ $i }}" class=" text-Neutral-40">{{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 md:justify-end">
                    <button type="submit" class="buttonDark">Ajukan Surat</button>
                    {{-- <button type="submit" class="buttonDark">Cek Data</button> --}}
                </div>
            </form>
        </section>
    </main>
    <script>
        function toggleTujuan() {
            var tujuanField = document.getElementById("tujuanField");
            if (tujuanField.classList.contains('flex')) {
                tujuanField.classList.remove('flex');
                tujuanField.classList.add('hidden');
            } else if (tujuanField.classList.contains('hidden')) {
                tujuanField.classList.remove('hidden');
                tujuanField.classList.add('flex');
            }
        }
    </script>
@endsection
