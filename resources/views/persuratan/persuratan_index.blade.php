@extends('layout.template')

@section('content')
    <main class="p-2 bg-Neutral-10">
        <section class="p-4 flex flex-col gap-3 rounded-xl border border-Neutral-10 bg-Neutral-0 fadeIn">
            <p class="cardTitle">Riwayat Persuratan</p>

            <div class="p-3 flex flex-col gap-3 rounded-xl border border-Neutral-10">
                <div class="grid grid-cols-subgrid md:flex items-center gap-2 border-b pb-3">
                    <select name="rt_id" id="rt_id" class="font-medium md:max-w-[120px]" {{ Auth::user()->level != 'rw' ? 'disabled' : '' }} >
                        @for ($i = 1; $i <= 7; $i++)
                            <option value="{{$i}}">RT 0{{$i}}</option>
                        @endfor
                    </select>

                    <div class="relative w-[240px]">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.0586" cy="11.0586" r="7.06194" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.0033 20.0033L16.0517 16.0516" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <input type="search" name="searchData" id="searchData" placeholder="Cari data..." class="pl-12 pr-4 py-2 border rounded-md">
                    </div>
                </div>

                <div class="w-full bg-Neutral-0 overflow-x-auto">
                    <table class="text-left text-nowrap" id="tableDataKeluarga">
                        <thead class="border-b">
                            <tr>
                                <th>Tanggal</th>
                                <th>Pengaju</th>
                                <th>Jenis</th>
                                <th>Tujuan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>21 Mei 2024</td>
                                <td>Rafi Sampang</td>
                                <td>Surat Pengantar</td>
                                <td>Administrasi Kependudukan</td>
                                <td>
                                    <a href="#" class="bg-Primary-Base text-Neutral-0 font-medium px-4 py-2.5 gap-1 rounded-lg">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </section>
    </main>
@endsection