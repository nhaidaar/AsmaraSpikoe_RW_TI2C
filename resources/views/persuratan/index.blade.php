@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('prosesPersuratan') }}" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10 fadeIn">
                @csrf
                <div class="flex flex-col gap-6 md:gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Persuratan</p>
                        <p class="subsubtitle text-Neutral-40 text-nowrap">Pilih surat sesuai kebutuhan Anda.</p>
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

                    <div class="flex gap-2 justify-center text-center">
                        <div class="flex w-full">
                            <input type="radio" name="jenis" value="sp" id="sp" class="hidden peer" {{ old('jenis') == 'sp' | old('jenis') == null ? 'checked' : '' }}>
                            <label onclick="toggleSp()" for="sp" id="label-sp" class="bg-Neutral-0 peer-checked:bg-Primary-Base text-Neutral-100 peer-checked:text-Neutral-0 font-medium text-sm md:text-base p-3 rounded-full cursor-pointer text-nowrap md:w-full border-2 border-Neutral-10 peer-checked:border-transparent">Surat Pengantar</label>
                        </div>
                        <div class="flex w-full">
                            <input type="radio" name="jenis" value="sktm" id="sktm" class="hidden peer" {{ old('jenis') == 'sktm' ? 'checked' : '' }}>
                            <label onclick="toggleSktm()" for="sktm" id="label-sktm" class="bg-Neutral-0 peer-checked:bg-Primary-Base text-Neutral-100 peer-checked:text-Neutral-0 font-medium text-sm md:text-base p-3 rounded-full cursor-pointer text-nowrap md:w-full border-2 border-Neutral-10 peer-checked:border-transparent">Surat Tidak Mampu</label>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" placeholder="352xxxxxxxxxxxxx" value="{{ old('nik') }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tanggal">Tanggal Lahir</label>
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
                                    @for ($i = now()->year; $i >= 1900; $i--)
                                        <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        
                        <div id="tujuanField" class="flex flex-col gap-1">
                            <label for="tujuan">Tujuan Pengajuan</label>
                            <select name="tujuan" id="tujuan">
                                <option value="" class="text-Neutral-40" disabled selected>Tujuan</option>
                                <option value="Administrasi Kependudukan" {{ old('tujuan') == 'Administrasi Kependudukan' ? 'selected' : '' }}>Administrasi Kependudukan</option>
                                <option value="Pengajuan Bantuan Sosial" {{ old('tujuan') == 'Pengajuan Bantuan Sosial' ? 'selected' : '' }}>Pengajuan Bantuan Sosial</option>
                                <option value="Permohonan Administratif RT" {{ old('tujuan') == 'Permohonan Administratif RT' ? 'selected' : '' }}>Permohonan Administratif RT</option>
                                <option value="Permohonan Layanan Kesehatan" {{ old('tujuan') == 'Permohonan Layanan Kesehatan' ? 'selected' : '' }}>Permohonan Layanan Kesehatan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 md:justify-end">
                    <button type="submit" class="buttonDark w-full md:w-min">Ajukan Surat</button>
                    {{-- <button type="submit" class="buttonDark w-full md:w-min">Cek Data</button> --}}
                </div>
            </form>
        </section>
    </main>
    <script>
        var tujuanField = document.getElementById("tujuanField");
        
        function toggleSp() {
            if (tujuanField.classList.contains('hidden')) {
                tujuanField.classList.remove('hidden');
                tujuanField.classList.add('flex');
            }
        }

        function toggleSktm() {
            if (tujuanField.classList.contains('flex')) {
                tujuanField.classList.remove('flex');
                tujuanField.classList.add('hidden');
            }
        }
    </script>
@endsection
