@php
    $user = Auth::user();
@endphp
<div class="fixed top-0 w-full z-10">
    <header class="px-6 py-5 bg-Primary-Base">
        <nav class="flex justify-between text-Neutral-0">
            <a href="/" class="flex gap-1.5 items-center">
                <img src="/img/main_logo.png" class="w-8 h-8 m-0.5" alt="Gondorejo">
                <p class="text-2xl font-medium">Gondorejo</p>
            </a>
            <div class="hidden lg:flex gap-8 font-normal items-center">
                @if ($user)
                    <a href="/penduduk" class="{{ $active == 'penduduk' ? 'underline pointer-events-none' : ''}} hover:underline">Penduduk</a>
                @endif
                <a href="/informasi" class="{{ $active == 'informasi' ? 'underline pointer-events-none' : ''}} hover:underline">Informasi</a>
                <a href="/bansos" class="{{ $active == 'bansos' ? 'underline pointer-events-none' : ''}} hover:underline">Bantuan Sosial</a>
                <a href="/persuratan" class="{{ $active == 'persuratan' ? 'underline pointer-events-none' : ''}} hover:underline">Persuratan</a>
                <a href="/rt" class="{{ $active == 'rt' ? 'underline pointer-events-none' : ''}} hover:underline">Rukun Tetangga</a>
                @if ($user)
                    <a href="/keuangan" class="{{ $active == 'keuangan' ? 'underline pointer-events-none' : ''}} hover:underline">Keuangan</a>
                @endif
                <a href="{{ $user ? '/admin/logout' : '/admin' }}" class="px-4 py-2 rounded-lg font-medium bg-Neutral-0 text-Primary-Base">{{ $user ? 'Logout' : 'Login'}}</a>
            </div>
            <a onclick="toggleDropdownMenu()" class="p-2 flex items-center lg:hidden gap-1 rounded-[64px] bg-Neutral-0 hover:bg-Neutral-10 text-Neutral-Base cursor-pointer select-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                    <path fill="#1B1B1B" d="M2.5 15v-1.667h15V15h-15Zm0-4.167V9.167h15v1.666h-15Zm0-4.166V5h15v1.667h-15Z"/>
                </svg>                  
                <p class="font-medium">Menu</p>
            </a>
        </nav>
    </header>
    <section id="dropdownMenu" class="hidden lg:hidden p-2 absolute translate-x-2 translate-y-2 rounded-lg flex-col gap-1 bg-Neutral-0 w-[98%] shadow-md">
        @if ($user)
            <a href="/penduduk" class="{{ $active == 'penduduk' ? 'bg-Neutral-10 pointer-events-none' : ''}} p-2 rounded-md hover:bg-Neutral-10">Penduduk</a>
        @endif
        <a href="/informasi" class="{{ $active == 'informasi' ? 'bg-Neutral-10 pointer-events-none' : ''}} p-2 rounded-md hover:bg-Neutral-10">Informasi</a>
        <a href="/bansos" class="{{ $active == 'bansos' ? 'bg-Neutral-10 pointer-events-none' : ''}} p-2 rounded-md hover:bg-Neutral-10">Bantuan Sosial</a>
        <a href="/persuratan" class="{{ $active == 'persuratan' ? 'bg-Neutral-10 pointer-events-none' : ''}} p-2 rounded-md hover:bg-Neutral-10">Persuratan</a>
        <a href="/rt" class="{{ $active == 'rt' ? 'bg-Neutral-10 pointer-events-none' : ''}} p-2 rounded-md hover:bg-Neutral-10">Rukun Tetangga</a>
        @if ($user)
            <a href="/keuangan" class="{{ $active == 'keuangan' ? 'bg-Neutral-10 pointer-events-none' : ''}} p-2 rounded-md hover:bg-Neutral-10">Keuangan</a>
        @endif
        <a href="{{ $user ? '/admin/logout' : '/admin' }}" class="{{ $active == 'keuangan' ? 'bg-Neutral-10 pointer-events-none' : ''}} p-2 rounded-md hover:bg-Neutral-10">{{ $user ? 'Logout' : 'Login'}}</a>
    </section>
</div>
<div class="h-20"></div>

<script>
    function toggleDropdownMenu() {
        var dropdown = document.getElementById("dropdownMenu");
        if (dropdown.classList.contains('flex')) {
            dropdown.classList.remove('flex');
            dropdown.classList.add('hidden');
        } else if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            dropdown.classList.add('flex');
        }
    }
</script>