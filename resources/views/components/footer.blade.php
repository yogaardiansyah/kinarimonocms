{{-- resources/views/components/footer.blade.php --}}

@props([
    'communityName' => 'Kinarimono ID',
    'tagline' => 'Your Partner in Weebs Community!',
])

@php
    $year = date('Y');

    $navLinks = [
        ['name' => 'Tentang Kami', 'href' => url('/tentang')],
        ['name' => 'Kontak', 'href' => url('/kontak')],
        ['name' => 'Jejak Liputan', 'href' => url('/liputan-kami')],
        ['name' => 'Jadwal Event', 'href' => url('/jadwal-event')],
    ];

    // Ganti 'null' pada 'icon' dengan kode SVG jika Anda ingin menggunakan ikon.
    $socialLinks = [
        ['name' => 'X (Twitter)', 'href' => '#', 'icon' => null],
        ['name' => 'Instagram', 'href' => '#', 'icon' => null],
        ['name' => 'Facebook', 'href' => '#', 'icon' => null],
    ];
@endphp

<footer class="bg-gray-900 text-gray-300 py-10 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto">
        {{-- Grid utama: Info, Navigasi Cepat, Ikuti Kami --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            
            {{-- Bagian 1: Informasi Komunitas --}}
            <div class="space-y-4">
                <h3 class="text-2xl font-bold text-cyan-400">{{ $communityName }}</h3>
                <p class="text-sm text-gray-400">
                    {{ $tagline }}
                </p>
                <p class="text-xs text-gray-500">
                    Menghubungkan event, komunitas, dan antusiasme budaya pop Jepang di Indonesia!
                </p>
            </div>

            {{-- Bagian 2: Navigasi Cepat --}}
            <div class="space-y-3">
                <h4 class="text-lg font-semibold text-gray-100 mb-2">Navigasi Cepat</h4>
                <ul class="space-y-2">
                    @foreach ($navLinks as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="hover:text-cyan-400 transition-colors duration-200 text-sm">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Bagian 3: Ikuti Kami (Media Sosial) --}}
            <div class="space-y-3">
                <h4 class="text-lg font-semibold text-gray-100 mb-2">Ikuti Kami</h4>
                <div class="flex space-x-4">
                    @foreach ($socialLinks as $social)
                        <a
                            href="{{ $social['href'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Kunjungi {{ $social['name'] }} kami"
                            class="text-gray-400 hover:text-cyan-400 transition-colors duration-200"
                        >
                            @if ($social['icon'])
                                {!! $social['icon'] !!} {{-- Gunakan {!! !!} untuk render HTML dari string --}}
                            @else
                                <span class="text-sm underline">{{ $social['name'] }}</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Bagian Bawah: Copyright dan disclaimer --}}
        <div class="border-t border-gray-700 pt-8 mt-8 text-center">
            <p class="text-sm text-gray-500">
                © {{ $year }} {{ $communityName }}. Semua Hak Cipta Dilindungi.
            </p>
            <p class="text-xs text-gray-600 mt-1">
                Seluruh materi visual event adalah milik dari masing-masing penyelenggara acara.
            </p>
            <p class="text-xs text-gray-600 mt-2">
                Dibuat dengan <span class="text-red-500">❤️</span> oleh Tim {{ $communityName }}.
            </p>
        </div>
    </div>
</footer>