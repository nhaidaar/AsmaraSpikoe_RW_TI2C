@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('storeKeluarga') }}" method="post" class="lg:w-[664px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-20 fadeIn" enctype="multipart/form-data">
                
                @csrf
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Tambah Kartu Keluarga</p>
                        <p class="subsubtitle text-Neutral-40 text-nowrap">Tambahkan kartu keluarga yang sesuai disini.</p>
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
                            <input type="radio" name="jenis" value="newKK" id="newKK" class="hidden peer" {{ old('jenis') == 'newKK' | old('jenis') == null ? 'checked' : '' }}>
                            <label onclick="newKK()" for="newKK" id="label-newKK" class="bg-Neutral-0 peer-checked:bg-Primary-Base text-Neutral-100 peer-checked:text-Neutral-0 font-medium text-sm md:text-base p-3 rounded-full cursor-pointer text-nowrap md:w-full border-2 border-Neutral-10 peer-checked:border-transparent">Warga Baru</label>
                        </div>
                        <div class="flex w-full">
                            <input type="radio" name="jenis" value="oldKK" id="oldKK" class="hidden peer" {{ old('jenis') == 'oldKK' ? 'checked' : '' }}>
                            <label onclick="oldKK()" for="oldKK" id="label-oldKK" class="bg-Neutral-0 peer-checked:bg-Primary-Base text-Neutral-100 peer-checked:text-Neutral-0 font-medium text-sm md:text-base p-3 rounded-full cursor-pointer text-nowrap md:w-full border-2 border-Neutral-10 peer-checked:border-transparent">Warga Lama</label>
                        </div>
                    </div>
                    
                    {{-- Kartu Keluarga --}}
                    <section class="flex flex-col gap-2">
                        <label>Kartu Keluarga (KK)</label>
                        <div class="p-4 flex flex-col gap-4 rounded-lg border border-Neutral-20">
                            <div class="flex flex-col gap-3">
                                <label>
                                    Foto KK<span class="text-Error-Base">*</span>
                                </label>
                                <div id="dropZoneKK" class="flex flex-col justify-center items-center w-full px-4 py-8 bg-Neutral-10 border-2 border-Neutral-20 border-dashed rounded-md">
                                    <input type="file" name="imageKK" id="imageKK" class="hidden" accept="image/*">
        
                                    <label for="imageKK" id="image-label-kk" class="flex flex-col justify-center items-center gap-4">
                                        <svg class="bg-Neutral-Base p-2 rounded-full" width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1001_1714)">
                                                <path d="M7.00142 18.0002C5.7537 18.0002 4.55708 17.5261 3.6748 16.6822C2.79253 15.8383 2.29687 14.6937 2.29688 13.5002C2.29687 12.3067 2.79253 11.1621 3.6748 10.3182C4.55708 9.4743 5.7537 9.0002 7.00142 9.0002C7.29611 7.68737 8.15818 6.53368 9.39801 5.79291C10.0119 5.42612 10.7001 5.17174 11.4232 5.04431C12.1463 4.91687 12.8903 4.91887 13.6125 5.0502C14.3348 5.18152 15.0213 5.43959 15.6327 5.80968C16.2442 6.17976 16.7686 6.65461 17.1762 7.20712C17.5837 7.75963 17.8664 8.37898 18.008 9.02979C18.1496 9.68061 18.1473 10.3502 18.0014 11.0002H19.0014C19.9297 11.0002 20.8199 11.3689 21.4763 12.0253C22.1327 12.6817 22.5014 13.5719 22.5014 14.5002C22.5014 15.4285 22.1327 16.3187 21.4763 16.9751C20.8199 17.6314 19.9297 18.0002 19.0014 18.0002H18.0014" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9 15L12 12L15 15" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 12V21" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1001_1714">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
        
                                        <div class="flex flex-col gap-1 text-center">
                                            <p class="title">Unggah file Anda</p>
                                            <p class="subsubtitle text-Neutral-40 text-nowrap">
                                                Seret dan letakkan file Anda di sini atau 
                                                <span class="cursor-pointer text-Success-Base underline">pilih file</span>
                                            </p>
                                        </div>
                                    </label>
                                    
                                    <div id="image-preview-container-kk" class="hidden flex-col items-center gap-4">
                                        <img id="image-preview-kk" class="max-w-full rounded" />
                                        <button id="remove-image-kk" class="px-4 py-2 text-Neutral-0 bg-Error-50 hover:bg-Error-60 rounded-md">Hapus Gambar</button>
                                    </div>
                                </div>
                                <label class="text-Neutral-40 text-sm font-normal">
                                    <ul class="list-disc pl-4">
                                        <li>Ukuran maksimal 1 MB</li>
                                    </ul>
                                </label>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="no_kk">
                                    No. KK<span class="text-Error-Base">*</span>
                                </label>
                                <input type="text" name="no_kk" id="no_kk" placeholder="352xxxxxxxxxxxxx" value="{{ old('no_kk') }}">
                            </div>

                            <div class="flex flex-col gap-3">
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

                        </div>
                    </section>

                    {{-- Kepala Keluarga --}}
                    <section class="flex flex-col gap-2">
                        <label>Data Kepala Keluarga</label>
                        <input type="hidden" name="hubungan_id" id="hubungan_id" value="1">

                        <div id="oldNik" class="p-4 hidden flex-col gap-4 rounded-lg border border-Neutral-20">
                            <div class="flex flex-col gap-3">
                                <label for="oldNik">
                                    NIK<span class="text-Error-Base">*</span>
                                </label>
                                <input type="text" name="oldNik" placeholder="352xxxxxxxxxxxxx" value="{{ old('oldNik') }}">
                            </div>
                        </div>
                        
                        <div id="newNik" class="p-4 flex flex-col gap-4 rounded-lg border border-Neutral-20">
                            <div class="flex flex-col gap-3">
                                <label>
                                    Foto KTP<span class="text-Error-Base">*</span>
                                </label>
                                <div id="dropZoneKTP" class="flex flex-col justify-center items-center w-full px-4 py-8 bg-Neutral-10 border-2 border-Neutral-20 border-dashed rounded-md">
                                    <input type="file" name="imageKTP" id="imageKTP" class="hidden" accept="image/*">
        
                                    <label for="imageKTP" id="image-label-ktp" class="flex flex-col justify-center items-center gap-4">
                                        <svg class="bg-Neutral-Base p-2 rounded-full" width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1001_1714)">
                                                <path d="M7.00142 18.0002C5.7537 18.0002 4.55708 17.5261 3.6748 16.6822C2.79253 15.8383 2.29687 14.6937 2.29688 13.5002C2.29687 12.3067 2.79253 11.1621 3.6748 10.3182C4.55708 9.4743 5.7537 9.0002 7.00142 9.0002C7.29611 7.68737 8.15818 6.53368 9.39801 5.79291C10.0119 5.42612 10.7001 5.17174 11.4232 5.04431C12.1463 4.91687 12.8903 4.91887 13.6125 5.0502C14.3348 5.18152 15.0213 5.43959 15.6327 5.80968C16.2442 6.17976 16.7686 6.65461 17.1762 7.20712C17.5837 7.75963 17.8664 8.37898 18.008 9.02979C18.1496 9.68061 18.1473 10.3502 18.0014 11.0002H19.0014C19.9297 11.0002 20.8199 11.3689 21.4763 12.0253C22.1327 12.6817 22.5014 13.5719 22.5014 14.5002C22.5014 15.4285 22.1327 16.3187 21.4763 16.9751C20.8199 17.6314 19.9297 18.0002 19.0014 18.0002H18.0014" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9 15L12 12L15 15" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 12V21" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1001_1714">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
        
                                        <div class="flex flex-col gap-1 text-center">
                                            <p class="title">Unggah file Anda</p>
                                            <p class="subsubtitle text-Neutral-40 text-nowrap">
                                                Seret dan letakkan file Anda di sini atau 
                                                <span class="cursor-pointer text-Success-Base underline">pilih file</span>
                                            </p>
                                        </div>
                                    </label>
                                    
                                    <div id="image-preview-container-ktp" class="hidden flex-col items-center gap-4">
                                        <img id="image-preview-ktp" class="max-w-full rounded" />
                                        <button id="remove-image-ktp" class="px-4 py-2 text-Neutral-0 bg-Error-50 hover:bg-Error-60 rounded-md">Hapus Gambar</button>
                                    </div>
                                </div>
                                <label class="text-Neutral-40 text-sm font-normal">
                                    <ul class="list-disc pl-4">
                                        <li>KTP digunakan bagi umur 17 tahun keatas.</li>
                                        <li>Jika masih di bawah umur menggunakan KIA.</li>
                                        <li>Ukuran maksimal 1 MB</li>
                                    </ul>
                                </label>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="nama_warga">
                                    Nama<span class="text-Error-Base">*</span>
                                </label>
                                <input type="text" name="nama_warga" id="nama_warga" placeholder="Masukkan nama" value="{{ old('nama_warga') }}">
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="nik">
                                    NIK<span class="text-Error-Base">*</span>
                                </label>
                                <input type="text" name="nik" id="nik" placeholder="352xxxxxxxxxxxxx" value="{{ old('nik') }}">
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="tanggal">
                                    Tempat dan Tanggal Lahir<span class="text-Error-Base">*</span>
                                </label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan tempat lahir" value="{{ old('tempat_lahir') }}">
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

                            <div class="flex flex-col gap-3">
                                <label for="jenis_kelamin">
                                    Jenis Kelamin<span class="text-Error-Base">*</span>
                                </label>
                                <div class="flex gap-2 justify-center text-center">
                                    <div class="flex w-full">
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" id="laki-laki" class="hidden peer" {{ old('jenis_kelamin') == 'Laki-laki' || old('jenis_kelamin') == null ? 'checked' : '' }}>
                                        <label for="laki-laki" id="label-laki-laki" class="bg-Neutral-0 peer-checked:bg-Additional-Base text-Neutral-100 peer-checked:text-Neutral-0 font-normal lg:text-lg p-3 rounded-lg cursor-pointer text-nowrap w-full border-2 border-Neutral-10 peer-checked:border-transparent">Laki-laki</label>
                                    </div>
                                    <div class="flex w-full">
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" id="perempuan" class="hidden peer" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                        <label for="perempuan" id="label-perempuan" class="bg-Neutral-0 peer-checked:bg-Additional-Base text-Neutral-100 peer-checked:text-Neutral-0 font-normal lg:text-lg p-3 rounded-lg cursor-pointer text-nowrap w-full border-2 border-Neutral-10 peer-checked:border-transparent">Perempuan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="alamat_ktp">
                                    Alamat KTP<span class="text-Error-Base">*</span>
                                </label>
                                <input type="text" name="alamat_ktp" id="alamat_ktp" placeholder="Masukkan alamat KTP" value="{{ old('alamat_ktp') }}">
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="alamat_domisili">
                                    Alamat Domisili<span class="text-Error-Base">*</span>
                                </label>
                                <input type="text" name="alamat_domisili" id="alamat_domisili" placeholder="Masukkan alamat domisili" value="{{ old('alamat_domisili') }}">
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="agama">
                                    Agama<span class="text-Error-Base">*</span>
                                </label>
                                <select name="agama" id="agama">
                                    <option value="" class="text-Neutral-40" disabled selected>Pilih agama</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Khonghucu" {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                    <option value="Lainnya" {{ old('agama') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="status_perkawinan">
                                    Status Perkawinan<span class="text-Error-Base">*</span>
                                </label>
                                <select name="status_perkawinan" id="status_perkawinan">
                                    <option value="" class="text-Neutral-40" disabled selected>Pilih status perkawinan</option>
                                    <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                    <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                    <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                </select>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="pekerjaan">
                                    Pekerjaan<span class="text-Error-Base">*</span>
                                </label>
                                <select name="pekerjaan" id="pekerjaan">
                                    <option value="" class="text-Neutral-40" disabled selected>Pilih pekerjaan</option>
                                    @foreach ($pekerjaan as $item)
                                        <option value="{{ $item->pekerjaan_id }}" {{ old('pekerjaan') == $item->pekerjaan_id ? 'selected' : '' }}>{{ $item->pekerjaan_nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="status" class="hidden flex-col gap-3">
                                <label for="status_warga">
                                    Status Warga<span class="text-Error-Base">*</span>
                                </label>
                                <select name="status_warga" id="status_warga">
                                    <option value="Hidup" selected>Hidup</option>
                                    <option value="Meninggal" {{ old('status_warga') == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                                    <option value="Pindah" {{ old('status_warga') == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                                    <option value="Lainnya" {{ old('status_warga') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    {{-- Detail Tambahan --}}
                    <section id="detailTambahan" class="flex flex-col gap-2">
                        <label>Detail Tambahan</label>
                        <div class="p-4 flex flex-col gap-4 rounded-lg border border-Neutral-20">
                            <div class="flex flex-col gap-3">
                                <label for="pendapatan">
                                    Pendapatan per Bulan<span class="text-Error-Base">*</span>
                                </label>
                                <input type="number" name="pendapatan" id="pendapatan" placeholder="Masukkan pendapatan per bulan" value="{{ old('pendapatan') }}">
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="jumlah_kendaraan">
                                    Jumlah Kendaraan<span class="text-Error-Base">*</span>
                                </label>
                                <input type="number" name="jumlah_kendaraan" id="jumlah_kendaraan" placeholder="Masukkan jumlah kendaraan" value="{{ old('jumlah_kendaraan') }}">
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="bpjs">
                                    BPJS<span class="text-Error-Base">*</span>
                                </label>
                                <select name="bpjs" id="bpjs">
                                    <option value="" class="text-Neutral-40" disabled selected>Pilih tingkat BPJS</option>
                                    <option value="Kelas 1" {{ old('bpjs') == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                                    <option value="Kelas 2" {{ old('bpjs') == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                                    <option value="Kelas 3" {{ old('bpjs') == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                                    <option value="Tidak ada" {{ old('bpjs') == 'Tidak ada' ? 'selected' : '' }}>Tidak ada</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="luas_rumah">
                                    Luas Bangunan<span class="text-Error-Base">*</span>
                                </label>
                                <input type="number" name="luas_rumah" id="luas_rumah" placeholder="Masukkan luas bangunan (m2)" value="{{ old('luas_rumah') }}">
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="jumlah_tanggungan">
                                    Jumlah Tanggungan<span class="text-Error-Base">*</span>
                                </label>
                                <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan" placeholder="Masukkan jumlah tanggungan (anggota keluarga)" value="{{ old('jumlah_tanggungan') }}">
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="pbb">
                                    Pajak Bumi & Bangunan<span class="text-Error-Base">*</span>
                                </label>
                                <input type="number" name="pbb" id="pbb" placeholder="Masukkan pajak bumi dan bangunan" value="{{ old('pbb') }}">
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="tagihan_listrik">
                                    Tagihan Listrik<span class="text-Error-Base">*</span>
                                </label>
                                <input type="number" name="tagihan_listrik" id="tagihan_listrik" placeholder="Masukkan jumlah tagihan listrik (Rp)" value="{{ old('tagihan_listrik') }}">
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="tagihan_air">
                                    Tagihan Air<span class="text-Error-Base">*</span>
                                </label>
                                <input type="number" name="tagihan_air" id="tagihan_air" placeholder="Masukkan jumlah tagihan air (Rp)" value="{{ old('tagihan_air') }}">
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="tanggungan_pendidikan">
                                    Tanggungan Pendidikan<span class="text-Error-Base">*</span>
                                </label>
                                <input type="number" name="tanggungan_pendidikan" id="tanggungan_pendidikan" placeholder="Masukkan jumlah tanggungan (anggota keluarga)" value="{{ old('tanggungan_pendidikan') }}">
                            </div>
                        </div>
                    </section>

                </div>
                        
                <div class="flex gap-2 md:justify-end">
                    <a href="{{ route('penduduk') }}" class="buttonLight w-full md:w-min">Batal</a>
                    <button type="submit" class="buttonDark w-full md:w-min">Simpan Data</button>
                </div>
            </form>
        </section>
    </main>
    <script>
        var oldNik = document.getElementById("oldNik");
        var newNik = document.getElementById("newNik");
        var detailTambahan = document.getElementById("detailTambahan");

        function newKK() {
            oldNik.classList.remove('flex');
            oldNik.classList.add('hidden');

            newNik.classList.remove('hidden');
            newNik.classList.add('flex');
            detailTambahan.classList.remove('hidden');
            detailTambahan.classList.add('flex');
        }

        function oldKK() {
            oldNik.classList.remove('hidden');
            oldNik.classList.add('flex');

            newNik.classList.remove('flex');
            newNik.classList.add('hidden');
            detailTambahan.classList.remove('flex');
            detailTambahan.classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            var oldKKcheckbox = document.getElementById("oldKK");
            if (oldKKcheckbox.checked) {
                oldKK();
            } else {
                newKK();
            }
        });

        const kkInput = document.getElementById('imageKK');
        const ktpInput = document.getElementById('imageKTP');
        const kkLabel = document.getElementById('image-label-kk')
        const ktpLabel = document.getElementById('image-label-ktp')
        const kkContainer = document.getElementById('image-preview-container-kk');
        const ktpContainer = document.getElementById('image-preview-container-ktp');
        const kkPreview = document.getElementById('image-preview-kk');
        const ktpPreview = document.getElementById('image-preview-ktp');
        const removeKKButton = document.getElementById('remove-image-kk');
        const removeKTPButton = document.getElementById('remove-image-ktp');
        const dropZoneKK = document.getElementById('dropZoneKK');
        const dropZoneKTP = document.getElementById('dropZoneKTP');

        const handleKK = (kk) => {
            const file = kk[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    kkPreview.src = e.target.result;
                    kkLabel.classList.add('hidden');
                    kkContainer.classList.remove('hidden');
                    kkContainer.classList.add('flex');
                };
                reader.readAsDataURL(file);
            }
        };
        const handleKTP = (ktp) => {
            const file = ktp[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    ktpPreview.src = e.target.result;
                    ktpLabel.classList.add('hidden');
                    ktpContainer.classList.remove('hidden');
                    ktpContainer.classList.add('flex');
                };
                reader.readAsDataURL(file);
            }
        };

        kkInput.addEventListener('change', () => {
            handleKK(kkInput.files);
        });
        ktpInput.addEventListener('change', () => {
            handleKTP(ktpInput.files);
        });
        
        dropZoneKK.addEventListener('dragover', () => {
            event.preventDefault();
        })
        dropZoneKTP.addEventListener('dragover', () => {
            event.preventDefault();
        })

        dropZoneKK.addEventListener('drop', () => {
            event.preventDefault();
            const files = event.dataTransfer.files;
            handleKK(files);
        })
        dropZoneKTP.addEventListener('drop', () => {
            event.preventDefault();
            const files = event.dataTransfer.files;
            handleKTP(files);
        })

        removeKKButton.addEventListener('click', () => {
            event.preventDefault();
            kkInput.value = '';
            kkPreview.src = '';

            kkLabel.classList.remove('hidden');
            kkContainer.classList.add('hidden');
        });
        removeKTPButton.addEventListener('click', () => {
            event.preventDefault();
            ktpInput.value = '';
            ktpPreview.src = '';

            ktpLabel.classList.remove('hidden');
            ktpContainer.classList.add('hidden');
        });
    </script>
@endsection
