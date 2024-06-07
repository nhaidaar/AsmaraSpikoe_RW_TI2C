@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        @include('bansos.toggle')

        <section class="flex flex-col gap-3 p-4 bg-Neutral-0 rounded-xl">
            <p class="cardTitle">Penghitungan Kelayakan</p>

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

            @if ($success = Session::get('success'))
                <div class="p-3 md:p-4 flex gap-1.5 md:gap-2.5 bg-Success-10 border border-Success-20 rounded-lg items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <g clip-path="url(#a)">
                            <path stroke="#1f9d45" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12a9 9 0 1 0 18.001 0A9 9 0 0 0 3 12Zm9-3h.01"/>
                            <path stroke="#1f9d45" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 12h1v4h1"/>
                        </g>
                        <defs>
                            <clipPath id="a"><path fill="#fff" d="M0 0h24v24H0z"/></clipPath>
                        </defs>
                    </svg>
                    <p class="font-medium text-sm md:text-base text-Success-Base">{{ $success }}</p>
                </div>
            @endif

            <div class="p-3 flex flex-col gap-3 rounded-xl border border-Neutral-10">
                <div class="grid lg:flex gap-8 lg:flex-row justify-center lg:justify-between text-center w-full border-b pb-6 pt-3">
                    <div class="grid grid-cols-subgrid md:max-w-[600px] md:flex items-center gap-2">
                        <select name="rt_id" id="rt_id" class="font-medium md:max-w-[150px]">
                            <option value="" selected>Semua RT</option>
                            @for ($i = 1; $i <= 7; $i++)
                                <option value="{{$i}}">RT 0{{$i}}</option>
                            @endfor
                        </select>
    
                        <div class="relative w-full">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.0586" cy="11.0586" r="7.06194" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.0033 20.0033L16.0517 16.0516" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input type="search" name="searchData" id="searchData" placeholder="Cari data..." class="pl-12 pr-4 py-2 border rounded-md">
                        </div>
                    </div>

                    <a href="{{ route('hitungBansos') }}" class="flex items-center justify-center bg-Neutral-0 px-3 py-2 gap-2 border border-Neutral-20 rounded-lg text-nowrap hover:bg-Neutral-10">
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
                        <span>Hitung</span>
                    </a>
                </div>

                <div class="w-full bg-Neutral-0 overflow-x-auto fadeIn">
                    <table class="text-left text-nowrap">
                        <thead class="border-b">
                            <tr>
                                <th>Rank</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Total Skor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('bansos.perhitungan.child')
                        </tbody>
                    </table>

                    <input type="hidden" name="hidden_page" id="hidden_page" value="1">
                </div>
            </div>

        </section>
    </main>
    <script>
        $(document).ready(function () {
            const page = document.getElementById('hidden_page');
            const search = document.getElementById('searchData');
            const rt = document.getElementById('rt_id')

            const fetchData = () => {
                if(search.value === undefined){
                    search.value = "";
                }

                $.ajax({
                    url: "/bansos/perhitungan/?page=" + page.value + "&rt=" + rt.value +  "&search=" + search.value,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                        // console.log("/bansos/perhitungan/?page=" + page.value + "&rt=" + rt.value +  "&search=" + search.value);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching data:', textStatus, errorThrown);
                    }
                });
            }
            
            rt.addEventListener('change', function () {
                event.preventDefault();
                page.value = 1;
                fetchData();
            });

            $('body').on('click', '.pager a', function(event){
                event.preventDefault();
                var newPage = $(this).attr('href').split('page=')[1];
                page.value = newPage;
                fetchData();
            });

            let timer,
                timeoutVal = 500;
                
            $('body').on('keyup', '#searchData', function(e){
                event.preventDefault();

                window.clearTimeout(timer);
                timer = window.setTimeout(() => {
                    fetchData();
                }, timeoutVal);
            });
        });
    </script>
@endsection