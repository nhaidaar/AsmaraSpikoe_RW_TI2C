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
                    
                    @if (Auth::check())    
                        <a href="{{ route('createKeuangan') }}" class="flex items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap hover:bg-Primary-60">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 6V18M18 12H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Tambah Transaksi
                        </a>
                    @endif
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
                            @foreach ($keuangan as $item)
                                <tr>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->jenis_keuangan }}</td>
                                    <td>{{ $item->nominal }}</td>
                                    <td>{{ $item->keterangan_keuangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection
