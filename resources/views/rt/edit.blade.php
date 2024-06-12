@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <form action="{{ route('storeRt', $rt->rt_id) }}" method="post" class="md:w-[480px] p-4 flex flex-col gap-12 rounded-xl border border-Neutral-10">
                @csrf

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Edit Struktur</p>
                        <p class="subsubtitle text-Neutral-40 text-nowrap">Edit data pengurus</p>
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

                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-2">
                            <label for="jabatan">Jabatan <span class="text-Error-Base">*</span></label>
                            <input type="text" name="jabatan" id="jabatan" placeholder="Ketua RT 1" value="Ketua RT {{ str_pad($rt->rt_id, 2, '0', STR_PAD_LEFT) }}" disabled>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="ketua_rt">NIK <span class="text-Error-Base">*</span></label>
                            <input type="text" name="ketua_rt" id="ketua_rt" placeholder="35072*********" value="{{ $rt->ketuaRT->nik }}">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="no_telepon">Nomor Telepon <span class="text-Error-Base">*</span></label>
                            <input type="text" name="no_telepon" id="no_telepon" placeholder="Masukkan nomor telepon" value="{{ $rt->no_telepon }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 md:justify-end">
                    <a href="{{ route('rt') }}" class="buttonLight w-full md:w-min">Batal</a>
                    <button type="submit" class="buttonDark w-full md:w-min">Tambahkan</button>
                </div>
            </form>
        </section>
    </main>
@endsection