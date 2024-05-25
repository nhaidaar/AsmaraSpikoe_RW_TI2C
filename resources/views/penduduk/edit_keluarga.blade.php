@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('updateKeluarga', $kk->kk_id) }}" method="post" class="lg:w-[664px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-20 fadeIn" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}

                <div class="flex flex-col gap-6">
                    <p class="cardTitle text-center">Edit Data Keluarga</p>

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

                    <div class="flex flex-col gap-8 lg:gap-12">
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
            
                                        <label for="imageKK" id="image-label-kk" class="hidden flex-col justify-center items-center gap-4">
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
                                                <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">
                                                    Seret dan letakkan file Anda di sini atau 
                                                    <span class="cursor-pointer text-Success-Base underline">pilih file</span>
                                                </p>
                                            </div>
                                        </label>
                                        
                                        <div id="image-preview-container-kk" class="flex flex-col items-center gap-4">
                                            <img id="image-preview-kk" src="{{ asset('kk/' . $kk->no_kk) . '.png' }}" class="max-w-full rounded" />
                                            <button id="remove-image-kk" class="px-4 py-2 text-Neutral-0 bg-Error-50 hover:bg-Error-60 rounded-md">Hapus Gambar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <label for="no_kk">
                                        No. KK<span class="text-Error-Base">*</span>
                                    </label>
                                    <input type="text" name="no_kk" id="no_kk" placeholder="352xxxxxxxxxxxxx" value="{{ $kk->no_kk }}">
                                </div>
                            </div>
                        </section>

                        {{-- Anggota Keluarga --}}
                        @foreach ($anggota as $item)
                            <section class="flex flex-col gap-2">
                                <label>{{ $item->statusHubungan->keterangan }}</label>
                                <div class="p-4 flex flex-col gap-4 rounded-lg border border-Neutral-20">
                                    <div class="flex flex-col gap-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama" value="{{ $item->anggotaKeluarga->nama_warga }}" disabled>
                                    </div>

                                    <div class="flex flex-col gap-3">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" placeholder="Masukkan nik" value="{{ $item->anggotaKeluarga->nik }}" disabled>
                                    </div>

                                    <a href="{{ route('editWarga', $item->anggotaKeluarga->warga_id) }}" class="buttonLight">Edit</a>
                                </div>
                            </section>
                        @endforeach
                    </div>
                </div>
                        
                <div class="flex gap-2 md:justify-end">
                    <a href="{{ route('penduduk') }}" class="buttonLight md:w-min">Batal</a>
                    <button type="submit" class="buttonDark md:w-min">Simpan Data</button>
                </div>
            </form>
        </section>
    </main>
    <script>
        const kkInput = document.getElementById('imageKK');
        const kkLabel = document.getElementById('image-label-kk')
        const kkContainer = document.getElementById('image-preview-container-kk');
        const kkPreview = document.getElementById('image-preview-kk');
        const removeKKButton = document.getElementById('remove-image-kk');
        const dropZoneKK = document.getElementById('dropZoneKK');

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

        kkInput.addEventListener('change', () => {
            handleKK(kkInput.files);
        });
        
        dropZoneKK.addEventListener('dragover', () => {
            event.preventDefault();
        });

        dropZoneKK.addEventListener('drop', () => {
            event.preventDefault();
            const files = event.dataTransfer.files;
            handleKK(files);
        });
        
        removeKKButton.addEventListener('click', () => {
            event.preventDefault();
            kkInput.value = '';
            kkPreview.src = '';

            kkLabel.classList.remove('hidden');
            kkContainer.classList.add('hidden');
        });
    </script>
@endsection
