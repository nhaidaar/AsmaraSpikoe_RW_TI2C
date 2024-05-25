@extends('layout.template')

@section('content')
    <main class="p-2 flex flex-col gap-2 bg-Neutral-10">
        <section class="p-10 md:p-20 flex flex-col gap-6 rounded-xl border border-Neutral-10 bg-Neutral-0 h-[calc(88vh)] md:h-[calc(87vh)]"> {{-- Outer Card --}}
            <div class="p-12 flex flex-col gap-4 justify-between md:justify-normal rounded-xl border border-Neutral-10 md:w-[480px] self-center fadeIn"> {{-- Inner Card --}}
                <div class="flex flex-col gap-12">
                    <div class="flex flex-col gap-2 text-center">
                        <p class="cardTitle">Halaman dalam perbaikan</p>
                        <p class="subsubtitle text-Neutral-40 text-nowrap">Sabar yaa...</p>
                    </div>
                    <img src="{{ asset('assets/maintenance.png') }}" alt=":)" class="h-60 w-60 flex self-center">
                </div>
            </div>
        </section>
    </main>
@endsection