{{-- resources/views/components/showcase-and-embed.blade.php --}}

@php
    $activityImagesData = [
        ['id' => 1, 'src' => asset('/images/cosplay/yubi.webp'), 'alt' => 'Cosplay Yubi'],
        ['id' => 2, 'src' => asset('/images/cosplay/herta.webp'), 'alt' => 'Cosplay Herta'],
        ['id' => 3, 'src' => asset('/images/cosplay/eririr.webp'), 'alt' => 'Cosplay Eriri'],
        ['id' => 4, 'src' => asset('/images/cosplay/kyoko.webp'), 'alt' => 'Another Cosplay 1'],
        ['id' => 5, 'src' => asset('/images/cosplay/kabuki.webp'), 'alt' => 'Another Cosplay 2'],
    ];
    $imagesJson = json_encode($activityImagesData);
    $instagramProfileUrl = "https://www.instagram.com/kinarimono/";
@endphp

<section 
    x-data="showcaseAndEmbed({
        images: {{ $imagesJson }},
        instagramUrl: '{{ $instagramProfileUrl }}'
    })"
    x-init="initInstagramEmbed()"
    class="min-h-screen flex flex-col bg-gray-100 py-12 md:py-16 px-4 sm:px-6 lg:px-8 overflow-x-hidden"
>
    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 text-center mb-10 sm:mb-16">
        Stay Connected & See Our Work!
    </h2>

    <div class="flex flex-col md:flex-row gap-8 md:gap-12 w-full max-w-screen-xl mx-auto flex-grow">
        
        {{-- Kolom Kiri: Showcase Galeri Kipas --}}
        <div class="w-full md:w-1/2 lg:w-3/5 flex flex-col">
            <h3 class="text-2xl sm:text-3xl font-semibold text-gray-800 text-center mb-6 md:mb-8">
                Kita Udah Ngapain Aja Sih?
            </h3>
            
            <div class="relative w-full h-[300px] sm:h-[400px] md:h-[450px] lg:h-[500px] flex-grow bg-gray-200/50 rounded-lg p-4">
                @foreach ($activityImagesData as $image)
                    <div
                        key="{{ $image['id'] }}"
                        class="absolute top-1/2 -translate-y-1/2 transition-all duration-500 ease-in-out cursor-pointer hover:filter-none hover:opacity-100"
                        :style="getImageStyles($loop->index)"
                        @click="handleImageClick($loop->index)"
                        role="button"
                        tabindex="0"
                    >
                        <img
                            src="{{ $image['src'] }}"
                            alt="{{ $image['alt'] }}"
                            class="absolute inset-0 w-full h-full object-cover rounded-xl sm:rounded-2xl shadow-2xl"
                        />
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Kolom Kanan: Embed Instagram --}}
        <div class="w-full md:w-1/2 lg:w-2/5 flex flex-col">
            <h3 class="text-2xl sm:text-3xl font-semibold text-gray-800 text-center mb-6 md:mb-8">
                Our Instagram Presence
            </h3>
            <div class="flex-grow flex items-center justify-center bg-gray-200/50 rounded-lg p-4 min-h-[400px] md:min-h-0">
                <div x-ref="instagramContainer" class="instagram-embed-wrapper w-full h-full max-h-[85vh] overflow-hidden flex items-center justify-center">
                    {{-- Embed akan disuntikkan di sini --}}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================================= --}}
{{-- BAGIAN YANG DIPERBAIKI ADA DI BAWAH INI --}}
{{-- ========================================================================= --}}
<script>
    function showcaseAndEmbed(config) {
        return {
            // ... (Fungsi getImageStyles dan handleImageClick tidak berubah, jadi saya singkat untuk kejelasan)
            selectedIndex: config.images.length > 0 ? Math.floor(config.images.length / 2) : 0,
            images: config.images,
            instagramUrl: config.instagramUrl,
            handleImageClick(index) { this.selectedIndex = index; },
            getImageStyles(index) {
                const totalImages = this.images.length; if (totalImages === 0) return {}; const isSelected = index === this.selectedIndex; const positionDifference = index - this.selectedIndex; const baseRotation = 12, rotationStep = 8; const horizontalOffsetBase = 110, horizontalOffsetStep = 70; const baseScale = 0.9, scaleStep = 0.07; const maxZIndex = totalImages + 5; const baseOpacity = 0.8, opacityStep = 0.15; const baseBrightness = 0.8, brightnessStep = 0.1; let styles = { left: '50%', width: 'clamp(120px, 30vw, 240px)', aspectRatio: '3/4', }; if (isSelected) { Object.assign(styles, { transform: 'translateX(-50%) scale(1.1) rotate(0deg)', zIndex: maxZIndex, opacity: 1, filter: 'brightness(1)', }); } else { const absPositionDifference = Math.abs(positionDifference); const sign = Math.sign(positionDifference); let currentTranslateX = 0; for (let i = 1; i <= absPositionDifference; i++) { currentTranslateX += (i === 1 ? horizontalOffsetBase : horizontalOffsetStep); } currentTranslateX *= sign; const rotation = sign * (baseRotation + (absPositionDifference - 1) * rotationStep); const scale = Math.max(0.5, baseScale - (absPositionDifference - 1) * scaleStep); const zIndex = maxZIndex - absPositionDifference - 1; const opacity = Math.max(0.3, baseOpacity - (absPositionDifference - 1) * opacityStep); const brightness = Math.max(0.4, baseBrightness - (absPositionDifference - 1) * brightnessStep); Object.assign(styles, { transform: `translateX(calc(-50% + ${currentTranslateX}px)) scale(${scale}) rotate(${rotation}deg)`, zIndex: Math.max(1, zIndex), opacity: opacity, filter: `brightness(${brightness})`, }); } return styles;
            },

            // --- FUNGSI INI SEPENUHNYA DIPERBARUI ---
            initInstagramEmbed() {
                const container = this.$refs.instagramContainer;
                if (!container) return;
                
                // 1. Selalu buat placeholder
                container.innerHTML = "";
                const blockquote = document.createElement("blockquote");
                blockquote.className = "instagram-media";
                blockquote.setAttribute("data-instgrm-permalink", this.instagramUrl);
                blockquote.setAttribute("data-instgrm-version", "14");
                Object.assign(blockquote.style, {
                    background: "#FFF", border: "0", borderRadius: "3px",
                    boxShadow: "0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15)",
                    margin: "1px auto", maxWidth: "500px", minWidth: "300px", padding: "0",
                    width: "calc(100% - 2px)", maxHeight: "85vh", overflowY: "auto"
                });
                container.appendChild(blockquote);

                // 2. Buat fungsi untuk memproses embed
                const processInstagram = () => {
                    if (window.instgrm && window.instgrm.Embeds) {
                        window.instgrm.Embeds.process();
                    }
                };

                // 3. Cek apakah skrip SUDAH SIAP, bukan hanya ada
                if (window.instgrm) {
                    // Jika objek 'instgrm' sudah ada, langsung proses.
                    processInstagram();
                } else {
                    // Jika tidak ada, cek apakah tag script sudah ada
                    const script = document.getElementById('instagram-embed-script');
                    if (script) {
                        // Jika script sudah ada tapi 'instgrm' belum siap,
                        // tambahkan listener baru ke event 'load'-nya.
                        script.addEventListener('load', processInstagram);
                    } else {
                        // Jika script sama sekali belum ada, buat baru
                        const newScript = document.createElement("script");
                        newScript.id = "instagram-embed-script";
                        newScript.src = "https://www.instagram.com/embed.js";
                        newScript.async = true;
                        newScript.onload = processInstagram; // Panggil proses setelah selesai load
                        document.body.appendChild(newScript);
                    }
                }
            }
        };
    }
</script>