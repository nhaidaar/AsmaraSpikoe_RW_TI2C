@extends('admin.layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0 overflow-auto">
            <form action="/bansos" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10">
                @csrf

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Tambahkan Pengumuman</p>
                        <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">Tambah pegumuman  sesuai yang diinginkan.</p>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col justify-center items-center w-full px-4 py-8 bg-Neutral-10 border border-Neutral-20 border-dashed rounded-md">
                            <input type="file" name="image" id="image" class="hidden" accept="image/*">

                            <label for="image" id="image-label" class="flex flex-col justify-center items-center gap-4">
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

                                <div class="flex flex-col text-center">
                                    <p class="title">Upload File Anda</p>
                                    <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">
                                        Seret dan letakkan file Anda di sini atau 
                                        <span class="cursor-pointer text-Success-Base underline">pilih file</span>
                                    </p>
                                </div>
                            </label>
                            
                            <div id="image-preview-container" class="hidden flex-col items-center gap-4">
                                <img id="image-preview" class="max-w-sm rounded" />
                                <button id="remove-image" class="px-4 py-2 text-Neutral-0 bg-Error-50 hover:bg-Error-60 rounded-md">Hapus Gambar</button>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" placeholder="Masukkan judul" value="{{ old('judul') }}">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="px-4 py-2 overflow-hidden w-full h-[186px] resize-none" placeholder="Masukkan deskripsi" value="{{ old('deskripsi') }}"></textarea>
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

    <script>
        const fileInput = document.getElementById('image');
        const imageLabel = document.getElementById('image-label')
        const imagePreviewContainer = document.getElementById('image-preview-container');
        const imagePreview = document.getElementById('image-preview');
        const removeImageButton = document.getElementById('remove-image');

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
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
        });

        removeImageButton.addEventListener('click', () => {
            fileInput.value = '';
            imagePreview.src = '';
            imagePreviewContainer.classList.add('hidden');
        });
    </script>
@endsection