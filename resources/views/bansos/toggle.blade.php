<section class="p-4 flex flex-row items-center md:items-start gap-4 rounded-xl border border-Neutral-10 bg-Neutral-0"> {{-- Outer Card --}}
    <a href="{{ route('indexPenerima') }}" class="p-3 flex flex-col gap-4 border {{ $cardActive == 'penerima' ? 'border-Primary-30 outline outline-4 outline-Primary-10' : 'border-Neutral-20'}} rounded-xl text-nowrap overflow-hidden w-full">
        <svg class="w-12 p-2 border border-Neutral-20 rounded-full" width="48" height="48" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1799_26945)">
                <path d="M12.0003 6.66602H9.33366C8.62641 6.66602 7.94814 6.94697 7.44804 7.44706C6.94794 7.94716 6.66699 8.62544 6.66699 9.33268V25.3327C6.66699 26.0399 6.94794 26.7182 7.44804 27.2183C7.94814 27.7184 8.62641 27.9993 9.33366 27.9993H22.667C23.3742 27.9993 24.0525 27.7184 24.5526 27.2183C25.0527 26.7182 25.3337 26.0399 25.3337 25.3327V9.33268C25.3337 8.62544 25.0527 7.94716 24.5526 7.44706C24.0525 6.94697 23.3742 6.66602 22.667 6.66602H20.0003" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 6.66667C12 5.95942 12.281 5.28115 12.781 4.78105C13.2811 4.28095 13.9594 4 14.6667 4H17.3333C18.0406 4 18.7189 4.28095 19.219 4.78105C19.719 5.28115 20 5.95942 20 6.66667C20 7.37391 19.719 8.05219 19.219 8.55228C18.7189 9.05238 18.0406 9.33333 17.3333 9.33333H14.6667C13.9594 9.33333 13.2811 9.05238 12.781 8.55228C12.281 8.05219 12 7.37391 12 6.66667Z" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 16H20" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 21.334H20" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
                <clipPath id="clip0_1799_26945">
                    <rect width="32" height="32" fill="white"/>
                </clipPath>
            </defs>
        </svg>

        <span class="flex flex-col gap-1">
            <p class="cardTitle">Daftar <br class="sm:hidden">Penerima Bansos</p>
            <p class="hidden lg:block subsubtitle text-Neutral-40">Klik untuk menampilkan daftar penerima bansos</p>
        </span>
    </a>

    <a href="{{ route('indexPenghitungan') }}" class="p-3 flex flex-col gap-4 border {{ $cardActive == 'penghitungan' ? 'border-Primary-30 outline outline-4 outline-Primary-10' : 'border-Neutral-20'}} rounded-xl text-nowrap overflow-hidden w-full">
        <svg class="w-12 p-2 border border-Neutral-20 rounded-full" width="48" height="48" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1799_26951)">
                <path d="M5.33301 6.66667C5.33301 5.95942 5.61396 5.28115 6.11406 4.78105C6.61415 4.28095 7.29243 4 7.99967 4H23.9997C24.7069 4 25.3852 4.28095 25.8853 4.78105C26.3854 5.28115 26.6663 5.95942 26.6663 6.66667V25.3333C26.6663 26.0406 26.3854 26.7189 25.8853 27.219C25.3852 27.719 24.7069 28 23.9997 28H7.99967C7.29243 28 6.61415 27.719 6.11406 27.219C5.61396 26.7189 5.33301 26.0406 5.33301 25.3333V6.66667Z" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.667 10.6673C10.667 10.3137 10.8075 9.97456 11.0575 9.72451C11.3076 9.47446 11.6467 9.33398 12.0003 9.33398H20.0003C20.3539 9.33398 20.6931 9.47446 20.9431 9.72451C21.1932 9.97456 21.3337 10.3137 21.3337 10.6673V12.0007C21.3337 12.3543 21.1932 12.6934 20.9431 12.9435C20.6931 13.1935 20.3539 13.334 20.0003 13.334H12.0003C11.6467 13.334 11.3076 13.1935 11.0575 12.9435C10.8075 12.6934 10.667 12.3543 10.667 12.0007V10.6673Z" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.667 18.666V18.6793" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 18.666V18.6793" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21.333 18.666V18.6793" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.667 22.666V22.6793" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 22.666V22.6793" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21.333 22.666V22.6793" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
                <clipPath id="clip0_1799_26951">
                    <rect width="32" height="32" fill="white"/>
                </clipPath>
            </defs>
        </svg>

        <span class="flex flex-col gap-1">
            <p class="cardTitle">Penghitungan <br class="sm:hidden">Kelayakan</p>
            <p class="hidden lg:block subsubtitle text-Neutral-40">Klik untuk mendapatkan ranking prioritas</p>
        </span>
    </a>
</section>