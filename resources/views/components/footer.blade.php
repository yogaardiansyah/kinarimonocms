{{-- resources/views/components/footer.blade.php --}}

@props([
    'communityName' => 'Kinarimono', // Nama default diubah
    'tagline' => 'Your Partner in the Weebs Community!',
    'logoPath' => null, // Prop baru untuk menampilkan logo (opsional)
])

@php
    $year = date('Y');

    // Tautan navigasi utama
    $quickLinks = [
        ['name' => 'Beranda', 'route' => 'pages.home'], // Asumsikan Anda punya route 'home'
        ['name' => 'Tentang Kami', 'route' => 'pages.tentang-kami'], // Sesuaikan dengan nama rute Anda
        ['name' => 'Jejak Liputan', 'route' => 'pages.liputan-kami'],
        ['name' => 'Jadwal Event', 'route' => 'pages.jadwal-event'],
        ['name' => 'Kontak', 'route' => 'pages.kontak'],
    ];

    // Tautan untuk halaman legal dan bantuan
    $legalLinks = [
        ['name' => 'Pusat Kebijakan', 'route' => 'pages.legal.pusat-kebijakan'],
        ['name' => 'Prinsip Komunitas', 'route' => 'pages.prinsip-komunitas'],
        ['name' => 'Kebijakan Hak Cipta', 'route' => 'pages.legal.kebijakan-hak-cipta'],
    ];

    // Tautan media sosial dengan ikon SVG
    $socialLinks = [
        [
            'name' => 'X (Twitter)', 
            'href' => 'https://twitter.com/yourhandle', 
            'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>'
        ],
        [
            'name' => 'Instagram', 
            'href' => 'https://instagram.com/yourhandle', 
            'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.08 2.525c.636-.247 1.363-.416 2.427-.465C9.53 2.013 9.884 2 12.315 2zm-1.163 1.943c-2.445 0-2.784.011-3.807.06-1.004.048-1.625.21-2.126.41a3.006 3.006 0 00-1.094.688 3.006 3.006 0 00-.688 1.094c-.2.501-.362 1.122-.41 2.126-.048 1.023-.06 1.362-.06 3.807s.012 2.784.06 3.807c.048 1.004.21 1.625.41 2.126a3.006 3.006 0 00.688 1.094 3.006 3.006 0 001.094.688c.501.2.1.122.362 2.126.41 1.023.048 1.362.06 3.807.06h7.616c2.445 0 2.784-.011 3.807-.06 1.004-.048 1.625-.21 2.126-.41a3.006 3.006 0 001.094-.688 3.006 3.006 0 00.688-1.094c.2-.501.362-1.122.41-2.126.048-1.023.06-1.362.06-3.807s-.012-2.784-.06-3.807c-.048-1.004-.21-1.625-.41-2.126a3.006 3.006 0 00-.688-1.094 3.006 3.006 0 00-1.094-.688c-.501-.2-1.122-.362-2.126-.41-1.023-.048-1.362-.06-3.807-.06zM12 6.865a5.135 5.135 0 100 10.27 5.135 5.135 0 000-10.27zm0 8.37a3.235 3.235 0 110-6.47 3.235 3.235 0 010 6.47zM17.53 6.115a1.23 1.23 0 100 2.46 1.23 1.23 0 000-2.46z" clip-rule="evenodd"/></svg>'
        ],
        [
            'name' => 'Facebook', 
            'href' => 'https://facebook.com/yourpage', 
            'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>'
        ],
    ];
@endphp

<footer class="bg-gray-900 text-gray-300">
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        {{-- Grid utama: Info, Navigasi Cepat, Legal, Ikuti Kami --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
            
            {{-- Bagian 1: Branding & Informasi --}}
            <div class="space-y-4">
                @if ($logoPath)
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($logoPath) }}" alt="{{ $communityName }} Logo" class="h-10 w-auto">
                    </a>
                @endif
                <h3 class="text-2xl font-bold text-white">{{ $communityName }}</h3>
                <p class="text-sm text-gray-400">
                    {{ $tagline }}
                </p>
            </div>

            {{-- Bagian 2: Navigasi Cepat --}}
            <div>
                <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase mb-4">Navigasi Cepat</h4>
                <ul class="space-y-3">
                    @foreach ($quickLinks as $link)
                        <li>
                            <a href="{{ route($link['route']) }}" class="text-gray-300 hover:text-cyan-400 transition-colors duration-200 text-base">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Bagian 3: Legal & Bantuan --}}
            <div>
                <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase mb-4">Legal & Bantuan</h4>
                <ul class="space-y-3">
                    @foreach ($legalLinks as $link)
                        <li>
                            <a href="{{ route($link['route']) }}" class="text-gray-300 hover:text-cyan-400 transition-colors duration-200 text-base">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Bagian 4: Ikuti Kami (Media Sosial) --}}
            <div>
                <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase mb-4">Ikuti Kami</h4>
                <div class="flex space-x-5">
                    @foreach ($socialLinks as $social)
                        <a
                            href="{{ $social['href'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Kunjungi {{ $social['name'] }} kami"
                            class="text-gray-400 hover:text-white transition-colors duration-200"
                        >
                            {!! $social['icon'] !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Bagian Bawah: Copyright dan disclaimer --}}
        <div class="border-t border-gray-800 pt-8 mt-8 text-center">
            <p class="text-sm text-gray-500">
                © {{ $year }} {{ $communityName }}. Semua Hak Cipta Dilindungi.
            </p>
            <p class="text-xs text-gray-600 mt-2">
                Dibuat dengan <span class="text-red-500 motion-safe:animate-pulse">❤️</span> oleh Tim {{ $communityName }}.
            </p>
        </div>
    </div>
</footer>