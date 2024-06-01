@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        @include('penduduk.toggle')
        <section class="p-4 flex flex-col gap-3 rounded-xl border border-Neutral-10 bg-Neutral-0"> {{-- Outer Card --}}
            <p class="cardTitle">Data Keluarga</p>

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
                    <div class="grid grid-cols-subgrid lg:max-w-[600px] lg:flex items-center gap-2">
                        <select name="rt_id" id="rt_id" class="font-medium lg:max-w-[100px]" {{ Auth::user()->level != 'rw' ? 'disabled' : '' }}>
                            @for ($i = 1; $i <= 7; $i++)
                                <option value="{{$i}}" {{ $rt == $i ? 'selected' : '' }}>RT 0{{$i}}</option>
                            @endfor
                        </select>

                        <div class="relative w-full">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.0586" cy="11.0586" r="7.06194" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.0033 20.0033L16.0517 16.0516" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input type="search" name="searchData" id="searchData" placeholder="Cari Kepala Keluarga ..." class="pl-12 pr-4 py-2 border rounded-md">
                        </div>

                    </div>
                    <a href="{{ route('createKeluarga') }}" class="flex items-center justify-center bg-Primary-Base text-Neutral-0 font-medium px-3 py-2 gap-1.5 rounded-lg text-nowrap hover:bg-Primary-60">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6V18M18 12H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Tambah Data
                    </a>
                </div>

                <div class="w-full bg-Neutral-0 overflow-x-auto fadeIn">
                    <table class="text-left text-nowrap mb-4" id="tableDataKeluarga">
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
                            @include('penduduk.keluarga.child')
                        </tbody>
                    </table>
                    
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1">
                </div>
            </div>
        </section>

        <!-- Delete Modal -->
        <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div id="modalOverlay" class="fixed inset-0 bg-Neutral-100 bg-opacity-30 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
                <div class="inline-block align-bottom bg-white rounded-lg text-center overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="p-4 flex flex-col gap-2 border border-b-2 border-Neutral-20">
                        <p class="cardTitle">Apakah Anda ingin hapus data ini?</p>
                        <p class="subtitle text-Neutral-40">Data seluruh anggota keluarga akan dihapus.</p>
                    </div>
                    <div class="p-4 flex flex-col gap-6">
                        <div class="flex flex-col gap-2">
                            <p class="title" id="keluargaName"></p>
                        </div>
                        <div class="flex flex-col gap-3 text-left">
                            <label for="choice">Alasan</label>
                            <select name="choice" id="choice" required>
                                <option value="Meninggal">Meninggal</option>
                                <option value="Pindah">Pindah Rumah</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-4 flex justify-end gap-2 border border-t-2 border-Neutral-20">
                        <button type="button" id="cancelDelete" class="buttonLight md:w-min">Batal</button>
                        <form id="deleteForm" method="POST" action="{{ route('deleteKeluarga') }}">
                            @csrf
                            
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="reason" id="reason">
                            <button type="submit" class="buttonDark md:w-min">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                    url: "/penduduk/keluarga/?page=" + page.value + "&rt=" + rt.value +  "&search=" + search.value,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                        // console.log("/penduduk/keluarga/?page=" + page.value + "&rt=" + rt.value +  "&search=" + search.value);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching data:', textStatus, errorThrown);
                    }
                });
            }
            
            rt.addEventListener('change', function () {
                event.preventDefault();
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

            let currentKeluargaId;

            $('body').on('click', '.delete-btn', function(event) {
                event.preventDefault();
                currentKeluargaId = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');

                keluargaName.textContent = 'Keluarga ' + name;
                deleteModal.classList.remove('hidden');
            });

            $('body').on('click', '#cancelDelete', function(event) {
                event.preventDefault();
                deleteModal.classList.add('hidden');
            });
            $('body').on('click', '#modalOverlay', function(event) {
                event.preventDefault();
                deleteModal.classList.add('hidden');
            });

            $('body').on('submit', '#deleteForm', function(event) {
                id.value = currentKeluargaId;
                reason.value = choice.value;
            });

        });
    </script>
@endsection