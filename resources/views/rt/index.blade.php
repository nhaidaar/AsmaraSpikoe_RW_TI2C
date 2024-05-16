@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-20 flex flex-col gap-12 rounded-xl border border-Neutral-10 items-center bg-Neutral-0">
            <div class="flex flex-col gap-2 text-center">
                <p class="cardTitle">Rukun Tetangga</p>
                <p class="font-normal text-sm md:text-base text-Neutral-40 text-nowrap">Informasi kepengurusan di dusun Gondorejo.</p>
            </div>
            
            <div class="rwCard">
                <div class="flex items-center justify-center">
                    <div class="h-8 w-8 rounded-full bg-[url('/public/img/RT1.png')] bg-cover bg-center"></div>
                </div>
                <div class="flex flex-col gap-1 text-center">
                    <p class="title">Chyntia Santi</p>
                    <p class="text-Neutral-40">Ketua RW 04</p>
                </div>
                <a href="https://wa.me/085872388203" class="px-4 py-3.5 flex gap-2 items-center text-center border border-Neutral-20 rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.09253 5.63644C4.91414 12.8995 11.1005 19.0859 18.3636 19.9075C19.3109 20.0146 20.1346 19.3271 20.3216 18.3922L20.7004 16.4979C20.8773 15.6135 20.4404 14.7202 19.6337 14.3168L18.3983 13.6992C17.5886 13.2943 16.6052 13.5264 16.062 14.2507C15.7082 14.7224 15.14 15.01 14.5962 14.782C12.7272 13.9986 10.0014 11.2728 9.21796 9.40381C8.99002 8.86004 9.27761 8.2918 9.7493 7.93802C10.4736 7.39483 10.7057 6.41142 10.3008 5.60168L9.68316 4.36632C9.27982 3.55963 8.38646 3.12271 7.50207 3.29959L5.60777 3.67845C4.67292 3.86542 3.98537 4.68912 4.09253 5.63644Z" stroke="#1B1B1B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="title text-nowrap">0858-7238-8203</p>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 justify-between gap-12">
                @foreach ($rt as $item)
                    <div class="rwCard">
                        <div class="flex items-center justify-center">
                            <div class="h-8 w-8 rounded-full bg-[url('/public/img/RT1.png')] bg-cover bg-center"></div>
                        </div>
                        <div class="flex flex-col gap-1 text-center">
                            <p class="title">{{$item->ketuaRT->nama_warga}}</p>
                            <p class="text-Neutral-40">Ketua RT {{ str_pad($item->rt_id, 2, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <a href="https://wa.me/{{$item->no_telepon}}" class="px-4 py-3.5 flex gap-2 items-center text-center border border-Neutral-20 rounded-lg">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.09253 5.63644C4.91414 12.8995 11.1005 19.0859 18.3636 19.9075C19.3109 20.0146 20.1346 19.3271 20.3216 18.3922L20.7004 16.4979C20.8773 15.6135 20.4404 14.7202 19.6337 14.3168L18.3983 13.6992C17.5886 13.2943 16.6052 13.5264 16.062 14.2507C15.7082 14.7224 15.14 15.01 14.5962 14.782C12.7272 13.9986 10.0014 11.2728 9.21796 9.40381C8.99002 8.86004 9.27761 8.2918 9.7493 7.93802C10.4736 7.39483 10.7057 6.41142 10.3008 5.60168L9.68316 4.36632C9.27982 3.55963 8.38646 3.12271 7.50207 3.29959L5.60777 3.67845C4.67292 3.86542 3.98537 4.68912 4.09253 5.63644Z" stroke="#1B1B1B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p class="title text-nowrap">{{ implode('-', str_split($item->no_telepon, 4)) }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection

