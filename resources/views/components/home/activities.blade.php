{{-- resources/views/components/activities.blade.php --}}

@php
    // Data untuk highlights/aktivitas
    $activitiesData = [
        [
            'id' => 1,
            'title' => 'Cosplay Competition XYZ - Grand Finals',
            'category' => 'Cosplay Showcase',
            'imageUrl' => asset('images/activities/cosplay-1.webp'),
            'description' => 'Saksikan kreativitas dan dedikasi yang luar biasa di grand final Kompetisi Cosplay XYZ. Para anggota komunitas kami bersinar di atas panggung!',
        ],
        [
            'id' => 2,
            'title' => 'Anime Fest International 2024 - Liputan Penuh',
            'category' => 'Laporan Event',
            'imageUrl' => asset('images/activities/event-1.webp'),
            'description' => 'Liputan mendalam tentang perjalanan dan pengalaman tim kami di Anime Fest International, menampilkan wawancara eksklusif dan konten di balik layar.',
        ],
        [
            'id' => 3,
            'title' => 'Eksplorasi Urban: Fotografi Jalanan Sinematik',
            'category' => 'Fotografi',
            'imageUrl' => asset('images/activities/photo-1.webp'),
            'description' => 'Koleksi terpilih dari fotografi jalanan sinematik dari eksplorasi urban terbaru kami, menangkap jiwa kota dari sudut pandang yang unik.',
        ],
        [
            'id' => 4,
            'title' => 'Karakter Game Legendaris: Sebuah Tribut Cosplay',
            'category' => 'Cosplay Masterclass',
            'imageUrl' => asset('images/activities/cosplay-2.webp'),
            'description' => 'Pameran mendetail dari cosplay karakter game legendaris, menyoroti keahlian dan hasrat dari para anggota berbakat kami.',
        ],
    ];
@endphp

<section class="h-screen flex flex-col bg-white text-gray-900 py-6 sm:py-8 md:py-10 overflow-hidden">
    {{-- Judul Section --}}
    <div class="container mx-auto px-4 text-center mb-4 sm:mb-6">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold">
            Community Highlights
        </h2>
    </div>

    {{-- Kontainer Utama untuk Horizontal Scroll --}}
    <div class="flex-grow flex flex-col justify-center relative pb-4 sm:pb-6">
        {{-- Wrapper untuk scroll dengan padding dan spasi --}}
        <div 
          class="flex overflow-x-scroll no-scrollbar space-x-6 sm:space-x-8 md:space-x-10 px-4 sm:px-6 md:px-8 lg:px-12" 
        >
          {{-- Loop untuk setiap kartu aktivitas --}}
          @foreach ($activitiesData as $activity)
            <div class="flex-none w-[80vw] sm:w-[70vw] md:w-[60vw] lg:w-[45rem] max-w-3xl h-auto bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                
                {{-- Bagian Gambar --}}
                <div class="relative w-full aspect-[16/10] sm:aspect-[16/9]">
                    <img
                      src="{{ $activity['imageUrl'] }}"
                      alt="{{ $activity['title'] }}"
                      class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                    />
                    {{-- Gradient overlay untuk teks di atasnya --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-75 group-hover:opacity-100 transition-opacity"></div>
                    
                    {{-- Kategori di pojok kanan atas --}}
                    <span class="absolute top-4 right-4 bg-cyan-600 text-white text-sm sm:text-base font-bold px-4 py-2 rounded-lg shadow-lg">
                      {{ $activity['category'] }}
                    </span>
                </div>

                {{-- Bagian Teks --}}
                <div class="p-5 sm:p-6 md:p-8">
                    <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 mb-3 leading-tight">
                        {{ $activity['title'] }}
                    </h3>
                    {{-- Deskripsi dengan efek line-clamp --}}
                    <p class="text-base sm:text-lg text-gray-700 line-clamp-3 sm:line-clamp-4 group-hover:line-clamp-none leading-relaxed transition-all duration-300">
                        {{ $activity['description'] }}
                    </p>
                </div>

            </div>
          @endforeach
        </div>
    </div>
</section>