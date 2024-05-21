<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gondorejo | Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[url('/public/img/login_cover.png')] bg-cover h-screen w-screen flex justify-center items-center p-4">
    <section class="p-12 flex flex-col items-center gap-8 bg-Neutral-0 rounded-xl">
        <div class="flex gap-1.5 items-center text-[28px] font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" fill="none" viewBox="0 0 33 32">
                <path fill="#1B1B1B" d="M18.44 25.136c.03-2.937-.716-5.326-1.663-5.335-.947-.01-1.738 2.364-1.767 5.301-.028 2.937.716 5.326 1.663 5.335.948.01 1.739-2.364 1.767-5.301Zm-5.493-.668c1.612-2.455 2.277-4.867 1.485-5.387-.792-.52-2.74 1.049-4.353 3.504-1.612 2.456-2.277 4.867-1.485 5.387.792.52 2.74-1.049 4.353-3.504ZM8.68 20.946c2.683-1.194 4.547-2.863 4.162-3.729-.385-.865-2.873-.599-5.557.595-2.683 1.194-4.547 2.863-4.162 3.729.385.865 2.873.599 5.556-.595Zm3.84-6.156c.144-.937-2.093-2.058-4.996-2.505-2.903-.447-5.373-.05-5.517.886-.145.937 2.092 2.058 4.995 2.505 2.903.446 5.374.05 5.518-.886Zm1.042-2.23c.627-.71-.648-2.863-2.85-4.808-2.2-1.945-4.493-2.946-5.12-2.237-.628.71.648 2.862 2.849 4.808 2.2 1.945 4.494 2.946 5.12 2.236Zm2.076-1.303c.911-.258 1.002-2.759.202-5.585s-2.187-4.908-3.098-4.65c-.912.258-1.003 2.758-.203 5.584.8 2.826 2.187 4.908 3.099 4.65Zm5.636-4.564c.855-2.81.814-5.311-.092-5.587-.906-.276-2.334 1.778-3.19 4.588-.855 2.81-.814 5.312.093 5.588.906.275 2.334-1.779 3.19-4.589Zm4.028 3.797c2.238-1.901 3.556-4.028 2.942-4.75-.613-.722-2.925.234-5.163 2.136-2.239 1.902-3.556 4.029-2.943 4.75.613.723 2.925-.234 5.164-2.136Zm1.331 5.373c2.912-.39 5.17-1.466 5.044-2.405-.125-.939-2.587-1.384-5.499-.995-2.91.39-5.17 1.467-5.044 2.405.126.94 2.588 1.385 5.5.995Zm3.756 5.945c.402-.857-1.428-2.563-4.088-3.81-2.66-1.246-5.142-1.561-5.543-.704-.402.858 1.428 2.564 4.087 3.81 2.66 1.247 5.142 1.562 5.544.704Zm-5.595 6.329c.802-.504.185-2.928-1.378-5.415-1.564-2.487-3.482-4.094-4.283-3.59-.802.505-.185 2.93 1.379 5.416 1.563 2.487 3.48 4.094 4.282 3.59Z"/>
            </svg>
            Gondorejo  
        </div>
        <span class="text-center flex flex-col gap-2">
            <p class="text-2xl md:text-3xl font-medium">Masuk sebagai admin</p>
            <p class="subtitle text-Neutral-40">Lengkapi nama dan NIK untuk masuk ke halaman selanjutnya.</p>
        </span>
        @if ($errors->any())
            <div class="p-3 md:p-4 flex gap-1.5 md:gap-2.5 w-full bg-Error-10 border border-Error-20 rounded-lg items-center">
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
        <form action="{{ route('login') }}" method="post" class="flex flex-col gap-6 w-full">
            @csrf
            
            <div class="flex flex-col gap-3">
                <label for="username">Nama Pengguna</label>
                <input type="text" name="username" id="username" placeholder="Masukkan nama pengguna" value="{{ old('username') }}">
            </div>
            <div class="flex flex-col gap-3">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" value="{{ old('password') }}">
                {{-- <a href="" class="text-right md:text-lg">Lupa password?</a> --}}
            </div>
            <div class="flex justify-end">
                <button type="submit" class="buttonDark">Masuk</button>
            </div>
        </form>
        <span class="subtitle text-Neutral-40">Gondorejo 2024. All rights reserved</span>
    </section>
</body>
</html>