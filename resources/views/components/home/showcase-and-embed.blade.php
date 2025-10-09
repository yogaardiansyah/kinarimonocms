{{-- resources/views/components/showcase-and-embed.blade.php --}}

@php
    // Data untuk galeri gambar
    $activityImagesData = [
        ['id' => 1, 'src' => asset('/images/cosplay/yubi.webp'), 'alt' => 'Cosplay Yubi'],
        ['id' => 2, 'src' => asset('/images/cosplay/herta.webp'), 'alt' => 'Cosplay Herta'],
        ['id' => 3, 'src' => asset('/images/cosplay/eririr.webp'), 'alt' => 'Cosplay Eriri'],
        ['id' => 4, 'src' => asset('/images/cosplay/kyoko.webp'), 'alt' => 'Another Cosplay 1'],
        ['id' => 5, 'src' => asset('/images/cosplay/kabuki.webp'), 'alt' => 'Another Cosplay 2'],
    ];
    // Mengonversi data ke format JSON untuk Alpine.js
    $imagesJson = json_encode($activityImagesData);
    // URL profil Instagram
    $instagramProfileUrl = "https://www.instagram.com/kinarimono/";
@endphp

{{-- 
  Komponen utama menggunakan Alpine.js.
  - x-data: Menginisialisasi state dengan memanggil fungsi showcaseAndEmbed.
  - x-init: Menjalankan fungsi untuk memuat embed Instagram setelah komponen siap.
--}}
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
            
            @if (!empty($activityImagesData))
                <div class="relative w-full h-[300px] sm:h-[400px] md:h-[450px] lg:h-[500px] flex-grow bg-gray-200/50 rounded-lg p-4">
                    {{-- Loop melalui gambar dan buat elemen untuk masing-masing --}}
                    @foreach ($activityImagesData as $index => $image)
                        <div
                            class="absolute top-1/2 -translate-y-1/2 transition-all duration-500 ease-in-out cursor-pointer hover:filter-none hover:opacity-100"
                            {{-- :style akan menerapkan gaya dinamis dari fungsi Alpine.js --}}
                            :style="getImageStyles({{ $index }})"
                            {{-- @click akan memanggil fungsi Alpine.js untuk mengubah gambar yang dipilih --}}
                            @click="handleImageClick({{ $index }})"
                            role="button"
                            tabindex="0"
                            @keydown.enter.prevent="handleImageClick({{ $index }})"
                        >
                            <img
                                src="{{ $image['src'] }}"
                                alt="{{ $image['alt'] }}"
                                {{-- Kelas ini meniru 'layout="fill" objectFit="cover"' dari Next.js --}}
                                class="absolute inset-0 w-full h-full object-cover rounded-xl sm:rounded-2xl shadow-2xl"
                                loading="lazy"
                            />
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 flex-grow flex items-center justify-center">
                    Belum ada aktivitas untuk ditampilkan.
                </p>
            @endif
        </div>

        {{-- Kolom Kanan: Embed Instagram --}}
        <div class="w-full md:w-1/2 lg:w-2/5 flex flex-col">
            <h3 class="text-2xl sm:text-3xl font-semibold text-gray-800 text-center mb-6 md:mb-8">
                Our Instagram Presence
            </h3>
            <div class="flex-grow flex items-center justify-center bg-gray-200/50 rounded-lg p-4 min-h-[400px] md:min-h-0">
                {{-- x-ref memberikan kita akses langsung ke elemen DOM ini dari dalam Alpine.js --}}
                <div x-ref="instagramContainer" class="instagram-embed-wrapper w-full h-full max-h-[85vh] overflow-hidden flex items-center justify-center">
                    {{-- Placeholder untuk loading, akan diganti oleh JavaScript --}}
                    <div style="padding: 16px; text-align: center;">
                        <p style="font-family: Arial, sans-serif; color: #999;">Loading Instagram Profile...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Pastikan Alpine.js sudah di-load sebelum skrip ini --}}
<script>
    // Fungsi ini mendefinisikan seluruh logika dan state untuk komponen Alpine.js
    function showcaseAndEmbed(config) {
        return {
            selectedIndex: config.images.length > 0 ? Math.floor(config.images.length / 2) : 0,
            images: config.images,
            instagramUrl: config.instagramUrl,

            // Mengubah gambar yang aktif saat diklik
            handleImageClick(index) {
                this.selectedIndex = index;
            },

            // Menghitung gaya dinamis untuk setiap gambar dalam galeri
            // Ini adalah terjemahan langsung dari logika React Anda
            getImageStyles(index) {
                const totalImages = this.images.length;
                if (totalImages === 0) return {};

                const isSelected = index === this.selectedIndex;
                const positionDifference = index - this.selectedIndex;
                
                // Variabel untuk mengontrol tampilan kartu
                const baseRotation = 12;
                const rotationStep = 8;
                const horizontalOffsetBase = 110;
                const horizontalOffsetStep = 70;
                const baseScale = 0.9;
                const scaleStep = 0.07;
                const maxZIndex = totalImages + 5;
                const baseOpacity = 0.8;
                const opacityStep = 0.15;
                const baseBrightness = 0.8;
                const brightnessStep = 0.1;
                
                let styles = {
                    left: '50%',
                    width: 'clamp(120px, 30vw, 240px)',
                    aspectRatio: '3/4',
                };

                if (isSelected) {
                    Object.assign(styles, {
                        transform: 'translateX(-50%) scale(1.1) rotate(0deg)',
                        zIndex: maxZIndex,
                        opacity: 1,
                        filter: 'brightness(1)',
                    });
                } else {
                    const absPositionDifference = Math.abs(positionDifference);
                    const sign = Math.sign(positionDifference);
                    
                    let currentTranslateX = 0;
                    for (let i = 1; i <= absPositionDifference; i++) {
                        currentTranslateX += (i === 1 ? horizontalOffsetBase : horizontalOffsetStep);
                    }
                    currentTranslateX *= sign;
                    
                    const rotation = sign * (baseRotation + (absPositionDifference - 1) * rotationStep);
                    const scale = Math.max(0.5, baseScale - (absPositionDifference - 1) * scaleStep);
                    const zIndex = maxZIndex - absPositionDifference - 1;
                    const opacity = Math.max(0.3, baseOpacity - (absPositionDifference - 1) * opacityStep);
                    const brightness = Math.max(0.4, baseBrightness - (absPositionDifference - 1) * brightnessStep);

                    Object.assign(styles, {
                        transform: `translateX(calc(-50% + ${currentTranslateX}px)) scale(${scale}) rotate(${rotation}deg)`,
                        zIndex: Math.max(1, zIndex),
                        opacity: opacity,
                        filter: `brightness(${brightness})`,
                    });
                }
                return styles;
            },

            // Logika untuk memuat dan memproses embed Instagram
            // Ini adalah bagian yang paling penting dan telah diperbaiki
            initInstagramEmbed() {
                const container = this.$refs.instagramContainer;
                if (!container) return;

                // 1. Bersihkan kontainer dan buat elemen blockquote
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
                
                // Tambahkan placeholder loading di dalam blockquote
                const placeholderWrapper = document.createElement('div');
                Object.assign(placeholderWrapper.style, { padding: "16px", textAlign: "center" });
                const loadingText = document.createElement('p');
                loadingText.textContent = "Loading Instagram Profile...";
                Object.assign(loadingText.style, { fontFamily: "Arial, sans-serif", color: "#999" });
                placeholderWrapper.appendChild(loadingText);
                blockquote.appendChild(placeholderWrapper);

                container.appendChild(blockquote);

                // 2. Fungsi untuk memproses embed Instagram
                const processInstagram = () => {
                    if (window.instgrm && window.instgrm.Embeds) {
                        window.instgrm.Embeds.process();
                    }
                };

                // 3. Logika pemuatan skrip yang andal
                // Cek apakah skrip belum ada di halaman
                if (!document.getElementById('instagram-embed-script')) {
                    // Jika belum ada, buat skrip baru
                    const script = document.createElement("script");
                    script.id = "instagram-embed-script";
                    script.src = "https://www.instagram.com/embed.js";
                    script.async = true;
                    script.defer = true;
                    // Setelah skrip selesai dimuat, panggil fungsi proses
                    script.onload = processInstagram;
                    document.body.appendChild(script);
                } else {
                    // Jika skrip sudah ada, langsung panggil fungsi proses.
                    // Ini aman karena fungsi `process` akan mencari `blockquote` baru
                    // yang belum diproses.
                    processInstagram();
                }
            }
        };
    }
</script>