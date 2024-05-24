@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10 md:h-screen">
        <section class="outerCard">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 justify-between gap-3"> {{-- Inner Card --}}

                {{-- Card 1 --}}
                <div class="flex md:flex-col items-center md:items-start p-3 gap-4 rounded-xl bg-Neutral-10 fadeIn">
                    <svg class="bg-Neutral-0 rounded-full p-2" width="48" height="48" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_938_3954)">
                            <path d="M13.3333 17.3333C13.3333 18.0405 13.6143 18.7188 14.1144 19.2189C14.6145 19.719 15.2927 20 16 20C16.7072 20 17.3855 19.719 17.8856 19.2189C18.3857 18.7188 18.6666 18.0405 18.6666 17.3333C18.6666 16.626 18.3857 15.9478 17.8856 15.4477C17.3855 14.9476 16.7072 14.6666 16 14.6666C15.2927 14.6666 14.6145 14.9476 14.1144 15.4477C13.6143 15.9478 13.3333 16.626 13.3333 17.3333Z" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.6667 28V26.6667C10.6667 25.9594 10.9476 25.2811 11.4477 24.781C11.9478 24.281 12.6261 24 13.3334 24H18.6667C19.3739 24 20.0522 24.281 20.5523 24.781C21.0524 25.2811 21.3334 25.9594 21.3334 26.6667V28" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 6.66667C20 7.37391 20.281 8.05219 20.781 8.55228C21.2811 9.05238 21.9594 9.33333 22.6667 9.33333C23.3739 9.33333 24.0522 9.05238 24.5523 8.55228C25.0524 8.05219 25.3333 7.37391 25.3333 6.66667C25.3333 5.95942 25.0524 5.28115 24.5523 4.78105C24.0522 4.28095 23.3739 4 22.6667 4C21.9594 4 21.2811 4.28095 20.781 4.78105C20.281 5.28115 20 5.95942 20 6.66667Z" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.6667 13.3334H25.3334C26.0406 13.3334 26.7189 13.6143 27.219 14.1144C27.7191 14.6145 28 15.2928 28 16V17.3334" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.66669 6.66667C6.66669 7.37391 6.94764 8.05219 7.44774 8.55228C7.94783 9.05238 8.62611 9.33333 9.33335 9.33333C10.0406 9.33333 10.7189 9.05238 11.219 8.55228C11.7191 8.05219 12 7.37391 12 6.66667C12 5.95942 11.7191 5.28115 11.219 4.78105C10.7189 4.28095 10.0406 4 9.33335 4C8.62611 4 7.94783 4.28095 7.44774 4.78105C6.94764 5.28115 6.66669 5.95942 6.66669 6.66667Z" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 17.3334V16C4 15.2928 4.28095 14.6145 4.78105 14.1144C5.28115 13.6143 5.95942 13.3334 6.66667 13.3334H9.33333" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_938_3954">
                                <rect width="32" height="32" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>

                    <span>
                        <p class="subtitle text-Neutral-40">Jumlah Penduduk</p>
                        <p class="cardTitle">{{ $warga->count() }}</p>
                    </span>
                </div>
                
                {{-- Card 2 --}}
                <div class="flex md:flex-col items-center  md:items-start p-3 gap-4 rounded-xl bg-Neutral-10 fadeIn">
                    <svg class="bg-Neutral-0 rounded-full p-2" width="48" height="48" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_938_3966)">
                            <path d="M10.6667 9.33333C10.6667 10.7478 11.2286 12.1044 12.2288 13.1046C13.229 14.1048 14.5855 14.6667 16 14.6667C17.4145 14.6667 18.771 14.1048 19.7712 13.1046C20.7714 12.1044 21.3333 10.7478 21.3333 9.33333C21.3333 7.91885 20.7714 6.56229 19.7712 5.5621C18.771 4.5619 17.4145 4 16 4C14.5855 4 13.229 4.5619 12.2288 5.5621C11.2286 6.56229 10.6667 7.91885 10.6667 9.33333Z" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 28V25.3333C8 23.9188 8.5619 22.5623 9.5621 21.5621C10.5623 20.5619 11.9188 20 13.3333 20H18.6667C20.0812 20 21.4377 20.5619 22.4379 21.5621C23.4381 22.5623 24 23.9188 24 25.3333V28" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_938_3966">
                                <rect width="32" height="32" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    
                    <span>
                        <p class="subtitle text-Neutral-40">Jumlah Keluarga</p>
                        <p class="cardTitle">{{ $keluarga->count() }}</p>
                    </span>
                </div>

                {{-- Card 3 --}}
                <div class="flex md:flex-col items-center md:items-start p-3 gap-4 rounded-xl bg-Neutral-10 fadeIn">
                    <svg class="bg-Neutral-0 rounded-full p-2" width="48" height="48" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_938_3966)">
                            <path d="M10.6667 9.33333C10.6667 10.7478 11.2286 12.1044 12.2288 13.1046C13.229 14.1048 14.5855 14.6667 16 14.6667C17.4145 14.6667 18.771 14.1048 19.7712 13.1046C20.7714 12.1044 21.3333 10.7478 21.3333 9.33333C21.3333 7.91885 20.7714 6.56229 19.7712 5.5621C18.771 4.5619 17.4145 4 16 4C14.5855 4 13.229 4.5619 12.2288 5.5621C11.2286 6.56229 10.6667 7.91885 10.6667 9.33333Z" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 28V25.3333C8 23.9188 8.5619 22.5623 9.5621 21.5621C10.5623 20.5619 11.9188 20 13.3333 20H18.6667C20.0812 20 21.4377 20.5619 22.4379 21.5621C23.4381 22.5623 24 23.9188 24 25.3333V28" stroke="#1B1B1B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_938_3966">
                                <rect width="32" height="32" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    
                    <span>
                        <p class="subtitle text-Neutral-40">Jumlah Penerima Bansos</p>
                        <p class="cardTitle">{{ $jumlahPenerimaBansos }}</p>
                    </span>
                </div>
            </div>
        </section>

        <section class="p-4 flex flex-col gap-3 rounded-xl border border-Neutral-10 bg-Neutral-0"> {{-- Outer Card --}}
            <p class="cardTitle">Cek Data Penduduk</p>

            <div class="p-3 flex flex-col gap-3 rounded-xl border border-Neutral-10"> {{-- Inner Card --}}
                <div class="grid lg:flex gap-8 lg:flex-row justify-center lg:justify-between text-center w-full border-b pb-6 pt-3">
                    <div class="flex text-center lg:w-60 items-center">
                        <div class="flex w-full">
                            <input type="radio" name="cekData" value="dataKeluarga" id="dataKeluarga" class="hidden peer" checked>
                            <label for="dataKeluarga" id="label-dataKeluarga" class="bg-Neutral-10 peer-checked:bg-Neutral-0 font-medium text-sm md:text-base px-2 md:px-3 py-2 rounded-l-lg cursor-pointer text-nowrap w-full border-2 border-Neutral-10">Data Keluarga</label>
                        </div>
                        <div class="flex w-full">
                            <input type="radio" name="cekData" value="dataWarga" id="dataWarga" class="hidden peer">
                            <label for="dataWarga" id="label-dataWarga" class="bg-Neutral-10 peer-checked:bg-Neutral-0 font-medium text-sm md:text-base px-2 md:px-3 py-2 rounded-r-lg cursor-pointer text-nowrap w-full border-2 border-Neutral-10">Data Warga</label>
                        </div>
                    </div>

                    <div class="grid grid-cols-subgrid md:max-w-[554px] md:flex items-center gap-2">
                        <select name="rt_id" id="rt_id" class="font-medium md:max-w-[120px]" {{ Auth::user()->level != 'rw' ? 'disabled' : '' }} >
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

                        <a href="{{ route('createKeluarga') }}" id="tambahKeluarga" class="flex items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 6V18M18 12H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Tambah Kartu Keluarga
                        </a>
                        <a href="{{ route('createWarga') }}" id="tambahPenduduk" class="hidden items-center justify-center bg-Primary-Base text-Neutral-0 px-3 py-2 gap-1.5 rounded-lg text-nowrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 6V18M18 12H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Tambah Data Warga
                        </a>
                    </div>
                </div>

                <div class="w-full bg-Neutral-0 overflow-x-auto fadeIn">
                    <table class="text-left text-nowrap" id="tableDataKeluarga">
                        <thead class="border-b">
                        <tr>
                            <th>No. KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Jumlah Anggota</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keluarga as $item)
                            <tr>
                                <td class="hidden" id="rt">{{ $item->kartuKeluarga->rt }}</td>
                                <td id="no_kk">{{ $item->kartuKeluarga->no_kk }}</td>
                                <td id="nama_kepala">{{ $item->anggotaKeluarga->nama_warga }}</td>
                                <td>{{ $item->where('kk_id', $item->kartukeluarga->kk_id)->count() }}</td>
                                <td>{{ $item->anggotaKeluarga->alamat_domisili }}</td>
                                <td>
                                    <a href="#" class="buttonLight md:w-min">Edit</a>
                                    <a href="#" class="buttonDark md:w-min">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="text-left w-full overflow-x-auto text-nowrap hidden" id="tableDataWarga">
                    <thead class="border-b">
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warga as $item)    
                        <tr>
                            <td class="hidden" id="rt">{{ $item->detailKK->kartuKeluarga->rt }}</td>
                            <td id="nik">{{ $item->nik }}</td>
                            <td id="nama_warga">{{ $item->nama_warga }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->alamat_domisili }}</td>
                            <td>
                                <a href="{{ route('editWarga', $item->warga_id) }}" class="buttonLight md:w-min">Edit</a>
                                <a href="#" class="buttonDark md:w-min">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </section>
    </main>
    <script>
        const dataKeluargaRadio = document.getElementById('dataKeluarga');
        const dataWargaRadio = document.getElementById('dataWarga');
        const tableDataKeluarga = document.getElementById('tableDataKeluarga');
        const tableDataWarga = document.getElementById('tableDataWarga');
        const tambahKeluarga = document.getElementById('tambahKeluarga');
        const tambahPenduduk = document.getElementById('tambahPenduduk');

        dataKeluargaRadio.addEventListener('change', function () {
            if (this.checked) {
                tableDataWarga.classList.add('hidden');
                tableDataKeluarga.classList.remove('hidden');
                
                tambahKeluarga.classList.add('flex');
                tambahKeluarga.classList.remove('hidden');
                tambahPenduduk.classList.add('hidden');
                tambahPenduduk.classList.remove('flex');
            }
        });

        dataWargaRadio.addEventListener('change', function() {
            if (this.checked) {
                tableDataKeluarga.classList.add('hidden');
                tableDataWarga.classList.remove('hidden');

                tambahPenduduk.classList.add('flex');
                tambahPenduduk.classList.remove('hidden');
                tambahKeluarga.classList.add('hidden');
                tambahKeluarga.classList.remove('flex');
            }
        });

        document.getElementById('rt_id').addEventListener('change', function() {
            filterAndSearchTable();
        });

        document.getElementById('searchData').addEventListener('input', function() {
            filterAndSearchTable();
        });

        function filterAndSearchTable() {
            var selectedRT = document.getElementById('rt_id').value;
            var search = document.getElementById('searchData').value.toLowerCase();

            var keluargaRows = document.querySelectorAll('#tableDataKeluarga tbody tr');
            keluargaRows.forEach(function(row) {
                var rtValue = row.querySelector('#rt').textContent.trim();
                var noKKValue = row.querySelector('#no_kk').textContent.trim().toLowerCase();
                var namaKepalaValue = row.querySelector('#nama_kepala').textContent.trim().toLowerCase();

                if ((rtValue === selectedRT || selectedRT === "") && 
                    (noKKValue.includes(search) || namaKepalaValue.includes(search) || search === "")) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });

            var wargaRows = document.querySelectorAll('#tableDataWarga tbody tr');
            wargaRows.forEach(function(row) {
                var rtValue = row.querySelector('#rt').textContent.trim();
                var nikValue = row.querySelector('#nik').textContent.trim().toLowerCase();
                var namaWargaValue = row.querySelector('#nama_warga').textContent.trim().toLowerCase();

                if ((rtValue === selectedRT || selectedRT === "") && 
                    (nikValue.includes(search) || namaWargaValue.includes(search) || search === "")) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }

        filterAndSearchTable();
    </script>
@endsection
