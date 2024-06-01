@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10 md:h-screen">
        <section class="grid grid-cols-1 md:grid-cols-2 gap-3 p-4 bg-Neutral-0 rounded-xl">
            <a href="{{ route('bansos') }}" class="flex flex-col p-3 gap-4 border border-Neutral-20 rounded-xl fadeIn">
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

                <div class="flex flex-col">
                    <span class="cardTitle">Daftar Penerima Bansos</span>
                    <span class="subtitle text-Neutral-40">Klik untuk menampilkan daftar penerima bansos</span>
                </div>
            </a>

            <a href="#" class="flex flex-col p-3 gap-4 border border-Neutral-20 rounded-xl fadeIn">
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

                <div class="flex flex-col">
                    <span class="cardTitle">Penghitungan Kelayakan</span>
                    <span class="subtitle text-Neutral-40">Klik untuk mendapatkan ranking prioritas</span>
                </div>
            </a>
        </section>

        <section class="flex flex-col gap-3 p-4 bg-Neutral-0 rounded-xl">
            <p class="cardTitle">Daftar Penerima Bansos</p>

            <div class="p-3 flex flex-col gap-3 rounded-xl border border-Neutral-10 fadeIn">
                <div class="grid lg:flex gap-8 lg:flex-row justify-center lg:justify-between text-center w-full border-b pb-6 pt-3">
                    <div class="grid grid-cols-subgrid md:max-w-[554px] md:flex items-center gap-2">
                        <select name="bulan" id="bulan" class="font-medium md:max-w-[120px]">
                            <option value="" class="text-Neutral-40" disabled selected>Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>

                        <select name="rt_id" id="rt_id" class="font-medium md:max-w-[120px]" {{-- {{ (Auth::check() && Auth::user()->level != 'rw') ? 'disabled' : '' }} --}}>
                            {{-- @for ($i = 1; $i <= 7; $i++)
                                <option value="{{$i}}" {{ $rt == $i ? 'selected' : '' }}>RT 0{{$i}}</option>
                            @endfor --}}
                        </select>

                        <div class="relative w-full">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.0586" cy="11.0586" r="7.06194" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.0033 20.0033L16.0517 16.0516" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input type="search" name="searchData" id="searchData" placeholder="Cari data..." class="pl-12 pr-4 py-2 border rounded-md">
                        </div>
                    </div>
                    
                    <a href="#" class="flex items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap hover:bg-Primary-60">
                        <span>Unduh CSV</span>

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1575_2641)">
                                <path d="M4 17V19C4 19.5304 4.21071 20.0391 4.58579 20.4142C4.96086 20.7893 5.46957 21 6 21H18C18.5304 21 19.0391 20.7893 19.4142 20.4142C19.7893 20.0391 20 19.5304 20 19V17" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7 11L12 16L17 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 4V16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1575_2641">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>

                <div class="w-full bg-Neutral-0 overflow-x-auto fadeIn">
                    <table class="text-left text-nowrap">
                        <thead class="border-b">
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Bansos</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>3527206343440001</td>
                                <td>Sal Priyai</td>
                                <td>Jl. Soekarno Hatta, No. 12</td>
                                <td>Bantuan Langsung Tunai (BLT)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-1.5">
                    <div class="flex items-center gap-1 px-3 py-2 border border-Neutral-20 rounded-xl">
                        <a href="#">
                            <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2329 4.18414C10.4626 4.423 10.4551 4.80282 10.2163 5.0325L7.06605 8L10.2163 10.9675C10.4551 11.1972 10.4626 11.577 10.2329 11.8159C10.0032 12.0547 9.62339 12.0622 9.38452 11.8325L5.78452 8.4325C5.66688 8.31938 5.60039 8.16321 5.60039 8C5.60039 7.83679 5.66688 7.68062 5.78452 7.5675L9.38452 4.1675C9.62339 3.93782 10.0032 3.94527 10.2329 4.18414Z" fill="#626262"/>
                            </svg>
                        </a>
    
                        <span>Back</span>
                    </div>
                    
                    <div class="flex gap-1.5">
                        <div class="flex items-center">
                            <input type="radio" name="page" id="page-1" class="peer hidden" checked>
                            <label for="page-1" class="flex items-center text-base px-3 py-2 border border-Neutral-20 rounded-xl peer-checked:text-Neutral-0 peer-checked:bg-Primary-30 peer-checked:border-Primary-30">1</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" name="page" id="page-2" class="peer hidden">
                            <label for="page-2" class="flex items-center text-base px-3 py-2 border border-Neutral-20 rounded-xl peer-checked:text-Neutral-0 peer-checked:bg-Primary-30 peer-checked:border-Primary-30">2</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" name="page" id="page-3" class="peer hidden">
                            <label for="page-3" class="flex items-center text-base px-3 py-2 border border-Neutral-20 rounded-xl peer-checked:text-Neutral-0 peer-checked:bg-Primary-30 peer-checked:border-Primary-30">3</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" name="page" id="page-4" class="peer hidden">
                            <label for="page-4" class="flex items-center text-base px-3 py-2 border border-Neutral-20 rounded-xl peer-checked:text-Neutral-0 peer-checked:bg-Primary-30 peer-checked:border-Primary-30">4</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" name="page" id="page-5" class="peer hidden">
                            <label for="page-5" class="flex items-center text-base px-3 py-2 border border-Neutral-20 rounded-xl peer-checked:text-Neutral-0 peer-checked:bg-Primary-30 peer-checked:border-Primary-30">5</label>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 px-3 py-2 border border-Neutral-20 rounded-xl">
                        <span>Next</span>

                        <a href="#">
                            <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.76711 11.8159C5.53743 11.577 5.54488 11.1972 5.78374 10.9675L8.93395 8L5.78374 5.0325C5.54488 4.80282 5.53743 4.423 5.76711 4.18413C5.99679 3.94527 6.37661 3.93782 6.61548 4.1675L10.2155 7.5675C10.3331 7.68062 10.3996 7.83679 10.3996 8C10.3996 8.16321 10.3331 8.31938 10.2155 8.4325L6.61548 11.8325C6.37661 12.0622 5.99679 12.0547 5.76711 11.8159Z" fill="#626262"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <p class="text-Neutral-40">Menampilkan 30 data dari 120 data </p>
                </div>
            </div>
        </section>
    </main>
@endsection