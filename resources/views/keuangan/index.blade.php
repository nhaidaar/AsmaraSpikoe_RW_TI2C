@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10 md:h-screen">
        <section class="outerCard">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 justify-between gap-3"> {{-- Inner Card --}}

                {{-- Card 1 --}}
                <div class="flex md:flex-col items-center md:items-start p-3 gap-4 rounded-xl bg-Neutral-10 fadeIn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48">
                        <rect width="48" height="48" fill="#fff" rx="24" />
                        <path stroke="#292D32" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.667 26.334c0 1.293 1 2.333 2.226 2.333H25.4c1.067 0 1.933-.907 1.933-2.04 0-1.213-.533-1.653-1.32-1.933L22 23.294c-.787-.28-1.32-.707-1.32-1.934 0-1.12.867-2.04 1.933-2.04h2.507c1.227 0 2.227 1.04 2.227 2.334M24 18v12" />
                        <path stroke="#292D32" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M37.333 24c0 7.36-5.973 13.333-13.333 13.333s-13.333-5.974-13.333-13.334c0-7.36 5.973-13.333 13.333-13.333M30.667 12v5.333H36m1.333-6.667-6.666 6.667" />
                    </svg>

                    <span>
                        <p class="subtitle text-Neutral-40">Total Kas</p>
                        <p class="cardTitle text-Success-Base">Rp {{ $totalKas }}</p>
                    </span>
                </div>

                {{-- Card 2 --}}
                <div class="flex md:flex-col items-center  md:items-start p-3 gap-4 rounded-xl bg-Neutral-10 fadeIn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none"
                        viewBox="0 0 48 48">
                        <rect width="48" height="48" fill="#fff" rx="24" />
                        <path stroke="#292D32" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.667 26.334c0 1.293 1 2.333 2.226 2.333H25.4c1.067 0 1.933-.907 1.933-2.04 0-1.213-.533-1.653-1.32-1.933L22 23.294c-.787-.28-1.32-.707-1.32-1.934 0-1.12.867-2.04 1.933-2.04h2.507c1.227 0 2.227 1.04 2.227 2.334M24 18v12" />
                        <path stroke="#292D32" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M37.333 24c0 7.36-5.973 13.333-13.333 13.333s-13.333-5.974-13.333-13.334c0-7.36 5.973-13.333 13.333-13.333M37.333 16v-5.334H32m-1.333 6.667 6.666-6.667" />
                    </svg>

                    <span>
                        <p class="subtitle text-Neutral-40">Total Pengeluaran</p>
                        <p class="cardTitle text-Error-Base">Rp {{ $totalPengeluaran }}</p>
                    </span>
                </div>
        </section>

        <section class="p-4 flex flex-col gap-3 rounded-xl border border-Neutral-10 bg-Neutral-0"> {{-- Outer Card --}}
            <p class="cardTitle">Riwayat Keuangan</p>

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

            <div class="p-3 flex flex-col gap-3 rounded-xl border border-Neutral-10"> {{-- Inner Card --}}
                <div class="grid lg:flex gap-8 lg:flex-row justify-center lg:justify-between text-center w-full border-b pb-6 pt-3">
                    <div class="grid grid-cols-subgrid md:max-w-[554px] md:flex items-center gap-2">
                        <select name="rt_id" id="rt_id" class="font-medium md:max-w-[120px]" {{ (Auth::check() && Auth::user()->level != 'rw') ? 'disabled' : '' }} >
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
                    </div>
                    
                    <a href="{{ route('createKeuangan') }}" class="flex items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap hover:bg-Primary-60">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6V18M18 12H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Tambah Transaksi
                    </a>
                </div>

                <div class="w-full bg-Neutral-0 overflow-x-auto fadeIn">
                    <table class="text-left text-nowrap" id="tableRiwayatKeuangan">
                        <thead class="border-b">
                            <tr>
                                <th>Tanggal</th>
                                <th>Jenis</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('keuangan.child')
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
                    url: "/keuangan?page=" + page.value + "&rt=" + rt.value +  "&search=" + search.value,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                        // console.log("/penduduk/warga/?page=" + page.value + "&rt=" + rt.value +  "&search=" + search.value);
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
