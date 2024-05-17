<div class="fixed top-0 w-full">
    <header class="p-6 bg-Primary-Base">
        <nav class="flex justify-between text-Neutral-0">
            <a href="/admin" class="flex gap-1.5">
                <img src="/img/main_logo.png" class="w-8 h-8 m-0.5" alt="Gondorejo">
                <p class="text-2xl font-medium">Gondorejo</p>
            </a>
            <div class="hidden md:flex gap-8 font-normal items-center">
                <a href="/admin" class="pointer-events-auto hover:underline">Penduduk</a>
                <a href="/admin/informasi" class="pointer-events-auto hover:underline">Informasi</a>
                <a href="/admin/bansos" class="pointer-events-auto hover:underline">Bansos</a>
                <a href="/admin/persuratan" class="pointer-events-auto hover:underline">Persuratan</a>
                <a href="/admin/keuangan" class="pointer-events-auto hover:underline">Keuangan</a>
            </div>
            <a onclick="toggleDropdownMenu()" class="p-2 flex items-center md:hidden gap-1 rounded-[64px] bg-Neutral-0 hover:bg-Neutral-10 text-Neutral-Base cursor-pointer select-none">
                <img src="/icons/menu.png" alt="" class="w-5 h-5">
                <p class="font-medium">Menu</p>
            </a>
        </nav>
    </header>
    <section id="dropdownMenu" class="hidden p-2 absolute translate-x-2 translate-y-2 rounded-lg flex-col gap-1 bg-Neutral-0 w-[98%] shadow-md">
        <a href="/" class="bg-Neutral-10 pointer-events-none p-2 rounded-md hover:bg-Neutral-10">Penduduk</a>
        <a href="/informasi" class="bg-Neutral-10 pointer-events-none p-2 rounded-md hover:bg-Neutral-10">Informasi</a>
        <a href="/bansos" class="bg-Neutral-10 pointer-events-none p-2 rounded-md hover:bg-Neutral-10">Bantuan Sosial</a>
        <a href="/persuratan" class="bg-Neutral-10 pointer-events-none p-2 rounded-md hover:bg-Neutral-10">Persuratan</a>
        <a href="/keuangan" class="bg-Neutral-10 pointer-events-none p-2 rounded-md hover:bg-Neutral-10">Keuangan</a>
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