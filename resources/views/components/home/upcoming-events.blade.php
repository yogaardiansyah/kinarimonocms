{{-- resources/views/components/upcoming-events.blade.php --}}

@php
    // Mendefinisikan data region dalam bentuk array PHP
    $eventRegions = [
        [
            'name' => 'JAKARTA',
            'characterImage' => asset('images/mascot/kirara_ai.webp'),
            'gradientColor' => 'from-[#FF8040]', // Kita simpan seluruh kelasnya untuk Tailwind JIT
        ],
        [
            'name' => 'BEKASI',
            'characterImage' => asset('images/mascot/kirara_ai1.webp'),
            'gradientColor' => 'from-[#40BFFF]',
        ],
        [
            'name' => 'BALI',
            'characterImage' => asset('images/mascot/kirara_ai2.webp'),
            'gradientColor' => 'from-[#40FF40]',
        ],
    ];

    // Path untuk gambar latar belakang
    $sectionBackgroundImage = asset('images/background/bg_event.webp');
@endphp

<section
    class="min-h-screen w-full flex flex-col items-center justify-center bg-white text-gray-800 pt-20 pb-12 px-4 sm:px-6 lg:px-8 bg-repeat"
    style="background-image: url('{{ $sectionBackgroundImage }}')"
>
    <div class="w-full max-w-6xl xl:max-w-7xl mx-auto text-center">
        
        {{-- Judul --}}
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-2 text-gray-900">
            Upcoming Announced Events
        </h2>
        <p class="text-md sm:text-lg md:text-xl text-gray-700 mb-12 sm:mb-16 md:mb-20">
            (Choose your region)
        </p>

        {{-- Grid Kartu Region --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10 lg:gap-20">

            {{-- Loop untuk setiap region --}}
            @foreach ($eventRegions as $region)
                <div class="relative group transform transition-all duration-300 hover:scale-105 aspect-[3/4] overflow-visible">
                    
                    {{-- 1. Backdrop / Efek Bayangan di Belakang --}}
                    <div class="absolute top-[5%] left-[10%] w-[80%] h-[90%] bg-gray-800/80 rounded-lg shadow-xl z-0 group-hover:bg-gray-800/90 transition-colors duration-300"></div>

                    {{-- 2. Kontainer Utama untuk Gambar dan Teks --}}
                    <div class="relative z-10 h-full">
                        <div class="absolute top-[5%] left-0 w-full h-[90%] rounded-lg relative overflow-hidden">
                            
                            {{-- Gambar Karakter --}}
                            {{-- Replikasi layout="fill" dari Next.js --}}
                            <div class="absolute inset-0">
                                <img
                                    src="{{ $region['characterImage'] }}"
                                    alt="Upcoming event in {{ $region['name'] }}"
                                    class="w-full h-full object-cover object-top opacity-90 group-hover:opacity-100 transition-opacity duration-300 transform origin-top"
                                />
                            </div>

                            {{-- Gradasi Warna dan Nama Region di Bawah --}}
                            <div class="absolute bottom-0 left-[10%] w-[80%] h-[40%] flex items-end justify-center p-2 pb-3 sm:p-3 sm:pb-4 bg-gradient-to-t {{ $region['gradientColor'] }} to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-300 z-10 rounded-b-lg">
                                <h3 class="text-center text-base sm:text-lg md:text-base lg:text-lg xl:text-xl font-bold text-white uppercase tracking-wider drop-shadow-md">
                                    {{ $region['name'] }}
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>