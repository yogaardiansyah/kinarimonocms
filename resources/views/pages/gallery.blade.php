{{-- File: resources/views/gallery-page.blade.php (REVISED - With Arbitrary Values) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Galeri Liputan Kami
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800">Jejak Lensa Kinarimono</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Setiap gambar adalah cerita. Inilah kumpulan momen terbaik yang berhasil kami abadikan dari berbagai event.
                </p>
            </div>

            <div class="masonry-container relative mx-auto">
                {{-- 
                    Arbitrary breakpoints untuk kontrol lebih presisi:
                    - Default (<480px): 1 kolom
                    - 480px+: 2 kolom
                    - 768px+: 4 kolom  
                    - 1024px+: 6 kolom
                --}}
                <div class="grid-sizer w-full min-[480px]:w-1/2 min-[768px]:w-1/4 min-[1024px]:w-1/6"></div>

                @foreach ($galleryImages as $image)
                    <div class="grid-item w-full min-[480px]:w-1/2 min-[768px]:w-1/4 min-[1024px]:w-1/3 p-2">
                        <a href="{{ Storage::url($image->image) }}" data-title="{{ $image->title }}" class="block relative group overflow-hidden rounded-lg shadow-lg">
                            <div class="relative w-full overflow-hidden bg-gray-200">
                                <img 
                                    class="w-full h-auto object-cover" 
                                    src="{{ Storage::url($image->image) }}" 
                                    alt="{{ $image->title }}"
                                    loading="lazy"
                                >
                            </div>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                <h3 class="text-white text-lg font-bold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">{{ $image->title }}</h3>
                                <p class="text-cyan-300 text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">{{ $image->event }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const grid = document.querySelector('.masonry-container');
            
            imagesLoaded(grid, function() {
                const msnry = new Masonry(grid, {
                    itemSelector: '.grid-item',
                    columnWidth: '.grid-sizer',
                    percentPosition: true,
                    gutter: 0
                });
            });
        });
    </script>
</x-app-layout>