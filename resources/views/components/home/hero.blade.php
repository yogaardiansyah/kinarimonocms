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

        {{-- Tampilan Desktop --}}
        <div
            x-show="loaded"
            x-transition:enter="transition ease-out duration-600"
            x-transition:enter-start="opacity-0 -translate-x-12"
            x-transition:enter-end="opacity-100 translate-x-0"
            class="hidden md:flex absolute top-6 left-0 sm:left-1 md:top-12 md:left-20 lg:top-16 lg:left-24 xl:left-32 z-20 flex-col items-center text-center w-auto space-y-3 md:space-y-4">
            <h1
                class="font-extrabold leading-tight text-white text-[1.75rem] sm:text-[2rem] md:text-[2.25rem] lg:text-[2.5rem] xl:text-[2.75rem]">
                Hai! Kamu Sedang Berada di
            </h1>
            <div class="w-auto my-1 md:my-2">
                <img src="/images/logo/logo_w.webp"
                    alt="Kinarimono Logo" width="300" height="85"
                    class="h-auto w-full max-w-[200px] sm:max-w-[220px] md:max-w-[270px] lg:max-w-[300px]" />
            </div>
            <p
                class="font-bold text-white text-[1.25rem] sm:text-[1.375rem] md:text-[1.5rem] lg:text-[1.625rem] xl:text-[1.75rem]">
                Your Partner in Weebs Community
            </p>
        </div>

        <div
            x-show="loaded"
            x-transition:enter="transition ease-out duration-600 delay-200"
            x-transition:enter-start="opacity-0 translate-x-12"
            x-transition:enter-end="opacity-100 translate-x-0"
            class="hidden md:block absolute top-0 -right-8 sm:-right-6 md:-right-4 lg:-right-2 xl:right-50 h-full w-[30%] sm:w-[30%] md:w-[32%] lg:w-[35%] xl:w-[38%] z-10 pointer-events-none">
            <div class="relative w-full h-full flex items-center justify-end">
                <div class="relative w-full h-auto max-h-[70%] sm:max-h-[65%] md:max-h-[75%] aspect-[7/10]">
                    {{-- 
                        PERUBAHAN KUNCI:
                        Kelas pada <img> diubah. Dihapus 'h-full' dan 'object-contain'.
                        Ditambahkan 'w-full' dan 'h-auto' agar gambar mengisi kontainer aspect-ratio
                        secara proporsional, meniru style inline 'width:100%; height:auto;' dari Next.js.
                    --}}
                    <img src="/images/mascot/kirara_ai.webp"
                        alt="Kinarimono Mascot Kirara Desktop" width="700" height="1000"
                        class="drop-shadow-2xl w-full h-auto" />
                </div>
            </div>
        </div>

        {{-- Tampilan Mobile --}}
        <div
            x-show="loaded"
            x-transition
            class="md:hidden flex flex-col items-center justify-around text-center w-full h-full p-4 sm:p-6">
            
            <div
                x-show="loaded"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0 translate-y-5"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="flex flex-col items-center space-y-3 sm:space-y-4">
                <h1 class="font-extrabold leading-tight text-white text-[2rem] sm:text-[2.25rem] max-w-xs">
                    Hai! Kamu Sedang Berada di
                </h1>
                <div class="w-auto">
                    <img src="/images/logo/logo_w.webp" alt="Kinarimono Logo" width="240" height="70"
                        class="h-auto w-full max-w-[160px] sm:max-w-[200px]" />
                </div>
                <p class="font-bold text-white text-[1.125rem] sm:text-[1.25rem] max-w-xs">
                    Your Partner in Weebs Community
                </p>
            </div>

            <div
                x-show="loaded"
                x-transition:enter="transition ease-out duration-500 delay-300"
                x-transition:enter-start="opacity-0 translate-y-5"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="w-full max-w-[220px] sm:max-w-[260px] mt-6 sm:mt-8">
                {{-- 
                    Kelas di sini sudah benar, 'w-full' dan 'h-auto' adalah padanan
                    langsung dari style inline 'width:100%; height:auto;'
                --}}
                <img src="/images/mascot/kirara_ai.webp" alt="Kinarimono Mascot Kirara Mobile" width="700" height="1000"
                    class="drop-shadow-lg w-full h-auto" />
            </div>
        </div>
    </section>

    {{-- Bagian Marquee --}}
    <div class="h-[7vh] bg-gray-900 flex items-center">
        <x-home.marquee />
    </div>
</div>