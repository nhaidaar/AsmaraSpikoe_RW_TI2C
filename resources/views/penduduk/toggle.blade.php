<section class="p-4 flex flex-row items-center md:items-start gap-4 rounded-xl border border-Neutral-10 bg-Neutral-0"> {{-- Outer Card --}}
    <a href="{{ route('indexKeluarga') }}" class="p-3 flex flex-col gap-4 border {{ $cardActive == 'keluarga' ? 'border-Primary-30 outline outline-4 outline-Primary-10' : 'border-Neutral-20'}} rounded-xl text-nowrap overflow-hidden w-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48">
            <rect width="47" height="47" x=".5" y=".5" fill="#fff" rx="23.5"/>
            <rect width="47" height="47" x=".5" y=".5" stroke="#E8E8E8" rx="23.5"/>
            <g clip-path="url(#a)">
              <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21.333 25.333a2.667 2.667 0 1 0 5.333 0 2.667 2.667 0 0 0-5.333 0ZM18.667 36v-1.333A2.667 2.667 0 0 1 21.334 32h5.333a2.667 2.667 0 0 1 2.667 2.667V36M28 14.667a2.667 2.667 0 1 0 5.334 0 2.667 2.667 0 0 0-5.334 0Zm2.667 6.667h2.667A2.667 2.667 0 0 1 36 24v1.334M14.667 14.667a2.667 2.667 0 1 0 5.333 0 2.667 2.667 0 0 0-5.333 0ZM12 25.334V24a2.667 2.667 0 0 1 2.667-2.666h2.666"/>
            </g>
            <defs>
              <clipPath id="a">
                <path fill="#fff" d="M8 8h32v32H8z"/>
              </clipPath>
            </defs>
        </svg>
        <span class="flex flex-col gap-1">
            <p class="cardTitle">Data <br class="sm:hidden">Keluarga</p>
            <p class="hidden lg:block subsubtitle text-Neutral-40">Klik untuk mengelola data keluarga RW 4</p>
        </span>
    </a>
    <a href="{{ route('indexWarga') }}" class="p-3 flex flex-col gap-4 border {{ $cardActive == 'warga' ? 'border-Primary-30 outline outline-4 outline-Primary-10' : 'border-Neutral-20'}} rounded-xl text-nowrap overflow-hidden w-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48">
            <rect width="47" height="47" x=".5" y=".5" fill="#fff" rx="23.5"/>
            <rect width="47" height="47" x=".5" y=".5" stroke="#E8E8E8" rx="23.5"/>
            <g clip-path="url(#a)">
              <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.667 17.333a5.333 5.333 0 1 0 10.667 0 5.333 5.333 0 0 0-10.667 0ZM16 36v-2.667A5.333 5.333 0 0 1 21.333 28h5.334A5.333 5.333 0 0 1 32 33.333V36"/>
            </g>
            <defs>
              <clipPath id="a">
                <path fill="#fff" d="M8 8h32v32H8z"/>
              </clipPath>
            </defs>
        </svg>          
        <span class="flex flex-col gap-1">
            <p class="cardTitle">Data <br class="sm:hidden">Warga</p>
            <p class="hidden lg:block subsubtitle text-Neutral-40">Klik untuk mengelola data warga RW 4</p>
        </span>
    </a>
    <a href="{{ route('indexInactive') }}" class="p-3 flex flex-col gap-4 border {{ $cardActive == 'inactive' ? 'border-Primary-30 outline outline-4 outline-Primary-10' : 'border-Neutral-20'}} rounded-xl text-nowrap overflow-hidden w-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48">
            <rect width="47" height="47" x=".5" y=".5" fill="#fff" rx="23.5"/>
            <rect width="47" height="47" x=".5" y=".5" stroke="#E8E8E8" rx="23.5"/>
            <g clip-path="url(#a)">
              <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.906 18.92a5.346 5.346 0 0 0 3.488 3.502m4.676-.727a5.333 5.333 0 1 0-7.453-7.402M16 36v-2.667A5.333 5.333 0 0 1 21.333 28h5.334c.549 0 1.08.083 1.577.237m3.51 3.491c.16.507.246 1.047.246 1.605V36M12 12l24 24"/>
            </g>
            <defs>
              <clipPath id="a">
                <path fill="#fff" d="M8 8h32v32H8z"/>
              </clipPath>
            </defs>
        </svg>          
        <span class="flex flex-col gap-1">
            <p class="cardTitle">Data <br class="sm:hidden">Tidak Aktif</p>
            <p class="hidden lg:block subsubtitle text-Neutral-40">Klik untuk mengelola data warga tidak aktif</p>
        </span>
    </a>
</section>