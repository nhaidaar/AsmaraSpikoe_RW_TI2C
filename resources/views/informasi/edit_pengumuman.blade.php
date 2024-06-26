@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('updatePengumuman', $pengumuman->pengumuman_id) }}" method="POST" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Edit Pengumuman</p>
                        <p class="subsubtitle text-Neutral-40 text-nowrap">Ubah pengumuman sesuai yang diinginkan.</p>
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
                        <div id="dropZone" class="flex flex-col justify-center items-center w-full px-4 py-8 bg-Neutral-10 border-2 border-Neutral-20 border-dashed rounded-md">
                            <input type="file" name="image" id="image" class="hidden" accept="image/*">

                            <label for="image" id="image-label" class="hidden flex-col justify-center items-center gap-4">
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
                            
                            <div id="image-preview-container" class="flex flex-col items-center gap-4">
                                <img id="image-preview" src="{{ asset('img/pengumuman/' . $pengumuman->pengumuman_id ) . '.png' }}" class="max-w-full rounded" />
                                <button id="remove-image" class="px-4 py-2 text-Neutral-0 bg-Error-50 hover:bg-Error-60 rounded-md">Hapus Gambar</button>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="judul">Judul <span class="text-Error-Base">*</span></label>
                            <input type="text" name="judul" id="judul" placeholder="Masukkan judul" value="{{ $pengumuman->pengumuman_nama }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea type="text" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi">{{ $pengumuman->pengumuman_detail }}</textarea>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tanggal">Tanggal <span class="text-Error-Base">*</span></label>
                            <div class="flex flex-col md:flex-row gap-2">
                                <select name="tanggal" id="tanggal">
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" class=" text-Neutral-40" {{ date('d', strtotime($pengumuman->tanggal_waktu)) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="bulan" id="bulan">
                                    <option value="1" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 1 ? 'selected' : '' }}>Januari</option>
                                    <option value="2" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 2 ? 'selected' : '' }}>Februari</option>
                                    <option value="3" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 3 ? 'selected' : '' }}>Maret</option>
                                    <option value="4" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 4 ? 'selected' : '' }}>April</option>
                                    <option value="5" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 5 ? 'selected' : '' }}>Mei</option>
                                    <option value="6" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 6 ? 'selected' : '' }}>Juni</option>
                                    <option value="7" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 7 ? 'selected' : '' }}>Juli</option>
                                    <option value="8" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 8 ? 'selected' : '' }}>Agustus</option>
                                    <option value="9" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 9 ? 'selected' : '' }}>September</option>
                                    <option value="10" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 10 ? 'selected' : '' }}>Oktober</option>
                                    <option value="11" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 11 ? 'selected' : '' }}>November</option>
                                    <option value="12" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == 12 ? 'selected' : '' }}>Desember</option>
                                </select>
                                <select name="tahun" id="tahun">
                                    @for ($i = now()->year; $i <= (now()->year + 5); $i++)
                                        <option value="{{ $i }}" class="text-Neutral-40" {{ date('m', strtotime($pengumuman->tanggal_waktu)) == $i ? 'selected' : '' }}>{{ $i }}</option>
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
                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" class=" text-Neutral-40" {{ date('H', strtotime($pengumuman->tanggal_waktu)) == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                    <p>.</p>
                                    <select name="menit" id="menit">
                                        @for ($i = 0; $i <= 59; $i++)
                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" class=" text-Neutral-40" {{ date('i', strtotime($pengumuman->tanggal_waktu)) == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                WIB
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tempat">Tempat <span class="text-Error-Base">*</span></label>
                            <input type="text" name="tempat" id="tempat" placeholder="Masukkan tempat" value="{{ $pengumuman->pengumuman_lokasi }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 md:justify-end">
                    <a href="{{ route('informasi') }}" class="buttonLight w-full md:w-min">Batal</a>
                    <button type="submit" class="buttonDark w-full md:w-min">Ubah</button>
                </div>
            </form>
        </section>
    </main>

    <script>
        const fileInput = document.getElementById('image');
        const imageLabel = document.getElementById('image-label')
        const imagePreviewContainer = document.getElementById('image-preview-container');
        const imagePreview = document.getElementById('image-preview');
        const removeImageButton = document.getElementById('remove-image');
        const dropZone = document.getElementById('dropZone');

        const handleFiles = (files) => {
            const file = files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                    imageLabel.classList.add('hidden');
                    imagePreviewContainer.classList.remove('hidden');
                    imagePreviewContainer.classList.add('flex');
                };
                reader.readAsDataURL(file);
            }
        };

        fileInput.addEventListener('change', () => {
            handleFiles(fileInput.files);
        });
        
        dropZone.addEventListener('dragover', () => {
            event.preventDefault();
        })

        dropZone.addEventListener('drop', () => {
            event.preventDefault();
            const files = event.dataTransfer.files;
            handleFiles(files);
        })

        removeImageButton.addEventListener('click', () => {
            event.preventDefault();
            fileInput.value = '';
            imagePreview.src = '';

            imageLabel.classList.remove('hidden');
            imageLabel.classList.add('flex');
            imagePreviewContainer.classList.add('hidden');
        });
    </script>
@endsection