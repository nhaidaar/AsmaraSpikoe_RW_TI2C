@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 bg-Neutral-0 h-[calc(87vh)] md:h-[calc(86vh)]"> {{-- Outer Card --}}
            <div class="p-4 flex flex-col gap-4 justify-between md:justify-normal rounded-xl border border-Neutral-10 md:w-[480px] h-lvh md:h-fit self-center"> {{-- Inner Card --}}
                <div class="flex flex-col gap-12">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Surat anda berhasil dibuat</p>
                        <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">Untuk informasi lebih lanjut bisa hubungi admin.</p>
                    </div>
                    <img src="{{ asset('assets/surat_success.png') }}" alt=":)" class="h-60 w-60 flex self-center">
                </div>
                <div class="flex flex-col gap-3 md:gap-2">
                    <a href="{{ $url }}" class="font-medium px-4 py-2 rounded-lg bg-Primary-Base text-Neutral-0 text-nowrap text-center">                      
                        Download Surat
                    </a>
                    <a href="https://wa.me/62{{$admin}}" class="flex gap-2 font-medium px-4 py-2 border border-solid rounded-md border-Neutral-20 text-nowrap text-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="#1B1B1B" fill-rule="evenodd" d="M18.378 5.628A8.906 8.906 0 0 0 12.038 3c-4.94 0-8.962 4.02-8.962 8.959a8.912 8.912 0 0 0 1.195 4.48L3 21.082l4.752-1.248a8.97 8.97 0 0 0 4.283 1.093h.003c4.94 0 8.96-4.02 8.962-8.962a8.911 8.911 0 0 0-2.622-6.337Zm-6.34 13.784h-.003a7.448 7.448 0 0 1-3.79-1.037l-.273-.161-2.822.738.753-2.748-.175-.281a7.428 7.428 0 0 1-1.14-3.964c0-4.105 3.343-7.444 7.453-7.444 1.99 0 3.858.776 5.265 2.182a7.407 7.407 0 0 1 2.18 5.268c0 4.107-3.343 7.447-7.448 7.447Zm4.084-5.578c-.223-.111-1.324-.653-1.53-.727-.204-.076-.354-.11-.503.112-.15.225-.577.73-.71.879-.128.146-.26.167-.482.055-.226-.111-.947-.348-1.802-1.113-.665-.592-1.116-1.327-1.245-1.55-.132-.225-.015-.345.096-.457.103-.1.226-.26.337-.392.112-.13.15-.223.226-.372.073-.15.035-.282-.02-.393-.056-.111-.505-1.216-.692-1.664-.182-.437-.366-.375-.504-.384-.129-.006-.278-.006-.428-.006a.82.82 0 0 0-.597.282c-.206.222-.783.764-.783 1.866 0 1.101.803 2.168.914 2.317.112.147 1.58 2.408 3.827 3.378.533.232.949.37 1.274.472.536.17 1.025.146 1.412.09.43-.064 1.324-.542 1.512-1.066.184-.521.184-.97.129-1.063-.056-.094-.205-.15-.43-.264Z" clip-rule="evenodd"/>
                        </svg>                      
                        <p>Hubungi Admin</p>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection