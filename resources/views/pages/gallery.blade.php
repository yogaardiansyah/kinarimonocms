<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Galeri Liputan Kami
        </h2>
    </x-slot>

    @php
        // Data dummy, sama seperti sebelumnya
        $galleryImages = [
            ['url' => 'https://picsum.photos/id/237/800/1200', 'title' => 'Cosplayer Keren di Event A', 'event' => 'Event A'],
            ['url' => 'https://picsum.photos/id/1025/800/600', 'title' => 'Suasana Panggung Utama', 'event' => 'Event B'],
            ['url' => 'https://picsum.photos/id/10/800/500', 'title' => 'Booth Komunitas', 'event' => 'Event A'],
            ['url' => 'https://picsum.photos/id/20/800/1000', 'title' => 'Detail Properti Kostum', 'event' => 'Event C'],
            ['url' => 'https://picsum.photos/id/30/800/600', 'title' => 'Pengunjung Antusias', 'event' => 'Event B'],
            ['url' => 'https://picsum.photos/id/40/800/1300', 'title' => 'Guest Star Performance', 'event' => 'Event C'],
            ['url' => 'https://picsum.photos/id/53/800/800', 'title' => 'Momen Seru', 'event' => 'Event A'],
            ['url' => 'https://picsum.photos/id/60/800/700', 'title' => 'Karya di Creators Market', 'event' => 'Event B'],
            ['url' => 'https://picsum.photos/id/88/800/1100', 'title' => 'Foto Grup', 'event' => 'Event C'],
        ];
    @endphp

    <div class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800">Jejak Lensa Kinarimono</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Setiap gambar adalah cerita. Inilah kumpulan momen terbaik yang berhasil kami abadikan dari berbagai event.
                </p>
            </div>

            {{-- Kontainer untuk Grid Masonry --}}
            {{-- Class 'mx-auto' digunakan untuk menengahkan grid jika ada sisa ruang --}}
            <div class="masonry-container mx-auto">
                
                {{-- 
                    DI SINI PERUBAHAN KUNCI #1: ELEMEN SIZER
                    Elemen tak terlihat ini digunakan oleh Masonry.js untuk mengukur lebar kolom.
                    Lebarnya diatur secara responsif oleh Tailwind.
                --}}
                <div class="grid-sizer w-full sm:w-1/2 lg:w-1/3"></div>

                @foreach ($galleryImages as $image)
                    {{-- 
                        DI SINI PERUBAHAN KUNCI #2: PENYEDERHANAAN GRID ITEM
                        Class lebar (w-full, sm:w-1/2, dll.) DIHAPUS dari sini.
                        Masonry.js akan mengatur lebarnya secara otomatis berdasarkan .grid-sizer.
                        Kita hanya perlu menambahkan padding untuk gutter.
                    --}}
                    <div class="grid-item p-2">
                        <a href="{{ $image['url'] }}" data-title="{{ $image['title'] }}" class="block relative group overflow-hidden rounded-lg shadow-lg">
                            <img class="w-full h-auto object-cover transition-transform duration-300 group-hover:scale-105" src="{{ $image['url'] }}" alt="{{ $image['title'] }}">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                <h3 class="text-white text-lg font-bold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">{{ $image['title'] }}</h3>
                                <p class="text-cyan-300 text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">{{ $image['event'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    @push('scripts')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var grid = document.querySelector('.masonry-container');
            
            imagesLoaded(grid, function() {
                var msnry = new Masonry(grid, {
                    itemSelector: '.grid-item',
                    
                    // DI SINI PERUBAHAN KUNCI #3: KONFIGURASI JAVASCRIPT
                    // Memberitahu Masonry untuk menggunakan .grid-sizer sebagai acuan lebar kolom.
                    columnWidth: '.grid-sizer',

                    percentPosition: true
                    // Gutter diatasi oleh padding pada .grid-item, jadi tidak perlu di-set di sini.
                });
            });
        });
    </script>
    @endpush
</x-app-layout>