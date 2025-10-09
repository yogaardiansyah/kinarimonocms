{{-- resources/views/components/home/hero.blade.php --}}

{{-- 
    Menggunakan Alpine.js untuk meniru animasi Framer Motion.
    Logika animasi ini tidak akan muncul di HTML final, tetapi akan
    memanipulasi kelas CSS untuk menciptakan efek visual yang sama.
--}}
<div x-data="{ loaded: false }" x-init="setTimeout(() => { loaded = true }, 50)" class="flex flex-col min-h-screen">

    {{-- Bagian Hero Utama --}}
    <section class="relative flex items-center justify-center overflow-hidden bg-cover bg-center h-[93vh]"
        style="background-image: url('/images/background/bg_f.jpg');">
        {{-- Path diubah dari asset() ke path absolut agar sama persis --}}

        {{-- ================================================== --}}
        {{-- Tampilan Desktop (1024px ke atas) --}}
        {{-- ================================================== --}}
        
        {{-- Kolom Teks Desktop --}}
        <div
            x-show="loaded"
            x-transition:enter="transition ease-out duration-600"
            x-transition:enter-start="opacity-0 -translate-x-12"
            x-transition:enter-end="opacity-100 translate-x-0"
            class="hidden min-[1024px]:flex absolute top-16 left-24 z-20 flex-col items-center text-center w-auto space-y-4">
            <h1
                class="font-extrabold leading-tight text-white text-[2.5rem] min-[1280px]:text-[2.75rem]">
                Hai! Kamu Sedang Berada di
            </h1>
            <div class="w-auto my-2">
                <img src="/images/logo/logo_w.webp"
                    alt="Kinarimono Logo" width="300" height="85"
                    class="h-auto w-full max-w-[270px] min-[1280px]:max-w-[300px]" />
            </div>
            <p
                class="font-bold text-white text-[1.625rem] min-[1280px]:text-[1.75rem]">
                Your Partner in Weebs Community
            </p>
        </div>

        {{-- Kolom Maskot Desktop --}}
        <div
            x-show="loaded"
            x-transition:enter="transition ease-out duration-600 delay-200"
            x-transition:enter-start="opacity-0 translate-x-12"
            x-transition:enter-end="opacity-100 translate-x-0"
            {{-- PERUBAHAN: Lebar kontainer diperbesar dan posisi digeser ke kanan menggunakan right negatif --}}
            class="hidden min-[1024px]:block absolute top-0 -right-12 h-full w-[48%] min-[1280px]:w-[45%] min-[1280px]:-right-16 z-10 pointer-events-none">
            <div class="relative w-full h-full flex items-end justify-center">
                {{-- PERUBAHAN: Gambar diturunkan lebih jauh dengan translate-y-24 --}}
                <img src="/images/mascot/kirara_ai1.webp"
                    alt="Kinarimono Mascot Kirara Desktop" width="700" height="1000"
                    class="drop-shadow-2xl h-full w-auto object-contain transform min-[1024px]:translate-y-50" />
            </div>
        </div>

        {{-- ================================================== --}}
        {{-- Tampilan Tablet (768px - 1023px) --}}
        {{-- ================================================== --}}
        <div
            x-show="loaded"
            x-transition
            class="hidden min-[768px]:flex min-[1024px]:hidden w-full h-full items-center justify-center p-8 z-10">
            
            {{-- Kolom Teks Tablet --}}
            <div 
                x-show="loaded"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0 -translate-x-8"
                x-transition:enter-end="opacity-100 translate-x-0"
                class="w-1/2 flex flex-col items-center text-center space-y-4 pr-4">
                <h1 class="font-extrabold leading-tight text-white text-[2.25rem]">
                    Hai! Kamu Sedang Berada di
                </h1>
                <div class="w-auto">
                    <img src="/images/logo/logo_w.webp" alt="Kinarimono Logo" width="240" height="70"
                        class="h-auto w-full max-w-[220px]" />
                </div>
                <p class="font-bold text-white text-[1.375rem]">
                    Your Partner in Weebs Community
                </p>
            </div>

            {{-- Kolom Maskot Tablet --}}
            <div 
                x-show="loaded"
                x-transition:enter="transition ease-out duration-500 delay-300"
                x-transition:enter-start="opacity-0 translate-x-8"
                x-transition:enter-end="opacity-100 translate-x-0"
                class="w-1/2 h-full flex items-end justify-center pointer-events-none">
                <img src="/images/mascot/kirara_ai1.webp" alt="Kinarimono Mascot Kirara Tablet" width="700" height="1000"
                    class="drop-shadow-xl h-full w-auto object-contain" />
            </div>
        </div>

        {{-- ================================================== --}}
        {{-- Tampilan Mobile (Di bawah 768px) --}}
        {{-- ================================================== --}}
        <div
            x-show="loaded"
            x-transition
            class="flex min-[768px]:hidden flex-col items-center justify-center text-center w-full h-full p-4 space-y-8">
            
            {{-- Konten Teks Mobile --}}
            <div
                x-show="loaded"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0 translate-y-5"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="flex flex-col items-center space-y-3 min-[425px]:space-y-4">
                <h1 class="font-extrabold leading-tight text-white text-[1.75rem] min-[375px]:text-[1.875rem] min-[425px]:text-[2rem] max-w-xs">
                    Hai! Kamu Sedang Berada di
                </h1>
                <div class="w-auto">
                    <img src="/images/logo/logo_w.webp" alt="Kinarimono Logo" width="240" height="70"
                        class="h-auto w-full max-w-[150px] min-[375px]:max-w-[160px] min-[425px]:max-w-[180px]" />
                </div>
                <p class="font-bold text-white text-[1rem] min-[375px]:text-[1.125rem] min-[425px]:text-[1.25rem] max-w-xs">
                    Your Partner in Weebs Community
                </p>
            </div>

            {{-- Konten Maskot Mobile --}}
            <div
                x-show="loaded"
                x-transition:enter="transition ease-out duration-500 delay-300"
                x-transition:enter-start="opacity-0 translate-y-5"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="w-full max-w-[240px] min-[375px]:max-w-[260px] min-[425px]:max-w-[280px]">
                <img src="/images/mascot/kirara_ai1.webp" alt="Kinarimono Mascot Kirara Mobile" width="700" height="1000"
                    class="drop-shadow-lg w-full h-auto" />
            </div>
        </div>
    </section>

    {{-- Bagian Marquee --}}
    <div class="h-[7vh] bg-gray-900 flex items-center">
        <x-home.marquee />
    </div>
</div>