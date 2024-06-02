@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        @include('bansos.toggle')

        <section class="flex flex-col gap-3 p-4 bg-Neutral-0 rounded-xl">
            <p class="cardTitle">Penghitungan Kelayakan</p>

            <div class="p-3 flex flex-col gap-3 rounded-xl border border-Neutral-10">
                <div class="grid lg:flex gap-8 lg:flex-row justify-center lg:justify-between text-center w-full border-b pb-6 pt-3">
                    <div class="grid grid-cols-subgrid md:max-w-[554px] md:flex items-center gap-2">
                        <select name="rt_id" id="rt_id" class="font-medium md:max-w-[120px]" {{ (Auth::check() && Auth::user()->level != 'rw') ? 'disabled' : '' }}>
                            @for ($i = 1; $i <= 7; $i++)
                                <option value="{{$i}}" {{ $rt == $i ? 'selected' : '' }}>RT 0{{$i}}</option>
                            @endfor
                        </select>
    
                        <div class="relative w-full">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.0586" cy="11.0586" r="7.06194" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.0033 20.0033L16.0517 16.0516" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input type="search" name="searchData" id="searchData" placeholder="Cari data..." class="pl-12 pr-4 py-2 border rounded-md">
                        </div>

                        <label for="rank-1" class="hidden {{-- flex --}} items-center gap-3">
                            <input id="rank-1" type="checkbox" class="appearance-none w-6 h-6 bg-white checked:bg-Primary-Base border-transparent checked:border-transparent">
                            <svg class="w-6 h-6 text-white absolute" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>3 NIK dipilih</span>
                        </label>
                    </div>

                    <a href="#" class="flex items-center justify-center bg-Neutral-0 px-3 py-2 gap-2 border border-Neutral-20 rounded-lg text-nowrap hover:bg-Neutral-20">
                        <span>Muat Ulang</span>
                        
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1575_2929)">
                                <path d="M20 11.0007C19.7554 9.2409 18.9391 7.61034 17.6766 6.36018C16.4142 5.11001 14.7758 4.3096 13.0137 4.08224C11.2516 3.85487 9.46362 4.21316 7.9252 5.10193C6.38678 5.99069 5.18325 7.36062 4.5 9.00068M4 5.00068V9.00068H8" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 13C4.24456 14.7598 5.06093 16.3903 6.32336 17.6405C7.58579 18.8907 9.22424 19.6911 10.9863 19.9184C12.7484 20.1458 14.5364 19.7875 16.0748 18.8988C17.6132 18.01 18.8168 16.6401 19.5 15M20 19V15H16" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1575_2929">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>

                    <a href="#" class="hidden {{-- flex --}} items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap hover:bg-Primary-60">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6V18M18 12H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <span>Tambahkan</span>
                    </a>
                </div>

                <div class="w-full bg-Neutral-0 overflow-x-auto fadeIn">
                    <table class="text-left text-nowrap">
                        <thead class="border-b">
                            <tr>
                                <th>
                                    <label for="rank" class="flex items-center gap-3">
                                        <input id="rank" type="checkbox" class="appearance-none w-6 h-6 bg-white checked:bg-Primary-Base border-transparent checked:border-transparent">
                                        <svg class="w-6 h-6 text-white absolute" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Rank</span>
                                    </label>    
                                </th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Total Skor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label for="rank-1" class="flex items-center gap-3">
                                        <input id="rank-1" type="checkbox" class="appearance-none w-6 h-6 bg-white checked:bg-Primary-Base border-transparent checked:border-transparent">
                                        <svg class="w-6 h-6 text-white absolute" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>1</span>
                                    </label>
                                </td>
                                <td>3527206343440001</td>
                                <td>Sal Priyai</td>
                                <td>50</td>
                                <td>
                                    <a href="#" class="items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap hover:bg-Primary-60">
                                        <span>Detail</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="rank-2" class="flex items-center gap-3">
                                        <input id="rank-2" type="checkbox" class="appearance-none w-6 h-6 bg-white checked:bg-Primary-Base border-transparent checked:border-transparent">
                                        <svg class="w-6 h-6 text-white absolute" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>1</span>
                                    </label>
                                </td>
                                <td>3527206343440001</td>
                                <td>Sal Priyai</td>
                                <td>50</td>
                                <td>
                                    <a href="#" class="items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap hover:bg-Primary-60">
                                        <span>Detail</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center md:justify-between">
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
                    
                <p class="text-Neutral-40">Menampilkan 30 data dari 120 data </p>
            </div>
        </section>
    </main>
@endsection