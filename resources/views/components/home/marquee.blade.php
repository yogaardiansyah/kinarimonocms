{{-- resources/views/components/home/marquee.blade.php --}}

@php
    // Jumlah item yang akan di-render dalam satu set, sama seperti di TSX
    $marqueeItemsCount = 15;
@endphp

<section class="overflow-hidden whitespace-nowrap">
    {{-- 
        KELAS DIUBAH:
        Kelas 'animate-marquee' dari Tailwind diganti dengan kelas kustom kita, 
        yaitu 'manual-animate-marquee'.
    --}}
    <div class="flex w-max manual-animate-marquee">
        
        {{-- SET 1: Render item asli --}}
        @for ($i = 0; $i < $marqueeItemsCount; $i++)
            <div class="flex items-center">
                <img
                    src="/images/logo/kinari.webp"
                    alt="Logo kinarimono"
                    class="h-12 w-auto"
                    width="96"
                    height="96"
                />
                <span class="h-12 border-l ml-6 mr-6"></span>
            </div>
        @endfor

        {{-- SET 2: Duplikat item untuk loop yang mulus --}}
        @for ($i = 0; $i < $marqueeItemsCount; $i++)
            <div class="flex items-center" aria-hidden="true">
                <img
                    src="/images/logo/kinari.webp"
                    alt="Logo kinarimono"
                    class="h-12 w-auto"
                    width="96"
                    height="96"
                />
                <span class="h-12 border-l ml-6 mr-6"></span>
            </div>
        @endfor

    </div>
</section>

{{-- =============================================================== --}}
{{-- CSS MANUAL DITAMBAHKAN DI SINI --}}
{{-- =============================================================== --}}
<style>
    @keyframes marquee {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .manual-animate-marquee {
        animation: marquee 30s linear infinite;
    }
</style>
{{-- =============================================================== --}}