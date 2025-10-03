{{-- resources/views/components/header.blade.php --}}

{{-- 
    Mendefinisikan props yang bisa diterima oleh komponen ini.
    Kita memberikan nilai default jika tidak diisi.
--}}
@props([
    'communityName' => 'Kinarimono ID'
])

@php
    // Mendefinisikan link navigasi dalam bentuk array PHP, sama seperti di React.
    $navLinks = [
        ['name' => 'Beranda', 'href' => url('/')],
        ['name' => 'Jadwal Event', 'href' => url('/jadwal-event')],
        ['name' => 'Liputan Kami', 'href' => url('/liputan-kami')],
        ['name' => 'Kontak', 'href' => url('/kontak')],
        // ['name' => 'Login/Daftar', 'href' => url('/auth')],
    ];
@endphp

{{-- 
    x-data menginisialisasi state, sama seperti useState() di React.
    @resize.window mereplikasi useEffect() yang merespons perubahan ukuran layar.
--}}
<header x-data="{ isMobileMenuOpen: false }" @resize.window="if (window.innerWidth >= 768) isMobileMenuOpen = false" class="bg-gray-800 text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            {{-- Bagian Kiri: Nama Komunitas / Logo --}}
            <div class="flex-shrink-0">
                <a href="{{ url('/') }}" class="text-2xl font-bold hover:text-cyan-400 transition-colors">
                    {{ $communityName }}
                </a>
            </div>

            {{-- Navigasi Desktop (Hidden di mobile) --}}
            <nav class="hidden md:flex space-x-6">
                @foreach ($navLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 hover:text-cyan-300 transition-colors"
                    >
                        {{ $link['name'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Tombol Hamburger Menu (Hanya tampil di mobile) --}}
            <div class="md:hidden flex items-center">
                <button
                    @click="isMobileMenuOpen = !isMobileMenuOpen" {{-- Mereplikasi onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)} --}}
                    type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu"
                    :aria-expanded="isMobileMenuOpen"
                >
                    <span class="sr-only">Buka menu utama</span>
                    
                    {{-- Ikon Menu (hamburger) - Ditampilkan saat menu tertutup --}}
                    <svg x-show="!isMobileMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                      
                    {{-- Ikon Close (X) - Ditampilkan saat menu terbuka --}}
                    <svg x-show="isMobileMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- 
        Panel Menu Mobile
        x-show="isMobileMenuOpen" mereplikasi className={`${isMobileMenuOpen ? 'block' : 'hidden'}`}
        x-transition menambahkan animasi fade-in/out yang halus.
    --}}
    <div x-show="isMobileMenuOpen" x-transition class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gray-700">
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['href'] }}"
                    @click="isMobileMenuOpen = false" {{-- Menutup menu saat link diklik --}}
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-600 hover:text-white transition-colors"
                >
                    {{ $link['name'] }}
                </a>
            @endforeach
        </div>
    </div>
</header>