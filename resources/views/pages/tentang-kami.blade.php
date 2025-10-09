<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <style>
            /* Style untuk memastikan peta mengisi kontainer */
            #interactive-map {
                width: 100%;
                height: 500px;
                /* Sesuaikan tinggi sesuai kebutuhan */
                border-radius: 0.5rem;
            }

            /* Style untuk hero section dengan background image */
            .hero-section {
                background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/your-hero-image.jpg');
                background-size: cover;
                background-position: center;
            }
        </style>
    @endpush



    {{-- ================================================== --}}
    {{-- 1. Hero Section: Pernyataan Misi yang Kuat --}}
    {{-- ================================================== --}}
    <section class="hero-section w-full h-[60vh] flex items-center justify-center text-white text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">
                Kami Bukan Sekadar Media, Kami Adalah Jantung Komunitas.
            </h1>
            <p class="text-lg md:text-xl max-w-3xl mx-auto">
                Di Kinarimono, kami percaya bahwa setiap event adalah sebuah panggung, setiap cosplayer adalah seniman,
                dan setiap penggemar adalah bagian dari cerita. Misi kami adalah mengabadikan energi itu, menghubungkan
                titik-titik dalam ekosistem pop culture Jepang di Indonesia, dan menjadi partner tepercaya bagi kreator,
                penyelenggara, dan komunitas.
            </p>
        </div>
    </section>

    <div class="bg-gray-50">
        <div class="container mx-auto px-4 py-16 md:py-24">

            {{-- ================================================== --}}
            {{-- 2. Kisah Kami: Awal Mula Kinarimono --}}
            {{-- ================================================== --}}
            <section class="mb-16 md:mb-24 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Berawal dari Passion, Dibangun untuk Komunitas.
                </h2>
                <div class="max-w-3xl mx-auto text-gray-600 space-y-4">
                    <p>
                        Kinarimono lahir dari sebuah pengamatan sederhana: begitu banyak event pop culture Jepang yang
                        luar biasa di Indonesia, namun liputannya seringkali kurang maksimal. Para penggemar kesulitan
                        menemukan jadwal acara yang terpusat, sementara para kreator dan penyelenggara butuh platform
                        untuk menjangkau audiens yang lebih luas.
                    </p>
                    <p>
                        Kami melihat kekosongan itu dan memutuskan untuk mengisinya. Berbekal kecintaan pada fotografi,
                        komunitas, dan budaya pop Jepang, Kinarimono didirikan bukan hanya sebagai media, tetapi sebagai
                        jembatan. Jembatan yang menghubungkan event dengan audiensnya, kreator dengan penggemarnya, dan
                        satu komunitas dengan komunitas lainnya.
                    </p>
                </div>
            </section>

            {{-- ================================================== --}}
            {{-- 3. Kenali Tim Kami: Wajah di Balik Lensa --}}
            {{-- ================================================== --}}
            <section class="mb-16 md:mb-24">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8 text-center">
                    Wajah di Balik Lensa dan Keyboard
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    {{-- Contoh Anggota Tim 1 --}}
                    <div class="text-center bg-white p-6 rounded-lg shadow-md">
                        <img src="/images/team/member1.jpg" alt="Nama Anggota Tim"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                        <h3 class="text-xl font-semibold text-gray-900">Nama Anda</h3>
                        <p class="text-gray-500 mb-2">Founder & Lead Photographer</p>
                        <p class="text-gray-600 text-sm">"Selalu mencari angle terbaik untuk mengabadikan detail
                            kostum."</p>
                    </div>
                    {{-- Contoh Anggota Tim 2 --}}
                    <div class="text-center bg-white p-6 rounded-lg shadow-md">
                        <img src="/images/team/member2.jpg" alt="Nama Anggota Tim"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                        <h3 class="text-xl font-semibold text-gray-900">Nama Rekan Anda</h3>
                        <p class="text-gray-500 mb-2">Event Correspondent</p>
                        <p class="text-gray-600 text-sm">"Menemukan cerita unik di setiap sudut keramaian event."</p>
                    </div>
                    {{-- Contoh Anggota Tim 3 --}}
                    <div class="text-center bg-white p-6 rounded-lg shadow-md">
                        <img src="/images/team/member3.jpg" alt="Nama Anggota Tim"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                        <h3 class="text-xl font-semibold text-gray-900">Nama Rekan Lain</h3>
                        <p class="text-gray-500 mb-2">Social Media Strategist</p>
                        <p class="text-gray-600 text-sm">"Mengubah momen menjadi konten yang menghubungkan."</p>
                    </div>
                    {{-- Tambahkan anggota tim lain di sini --}}
                </div>
            </section>

            {{-- ================================================== --}}
            {{-- 4. Jangkauan Layanan Kami: Di Mana Kami Beraksi --}}
            {{-- ================================================== --}}
            <section class="mb-16 md:mb-24">
                <div class="text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Menjangkau Komunitas, di Mana Pun Mereka Berada.
                    </h2>
                    <p class="max-w-3xl mx-auto text-gray-600 mb-8">
                        Misi kami tidak terbatas di satu kota. Kami berkomitmen untuk hadir dan meliput denyut nadi
                        komunitas di berbagai wilayah strategis. Peta di bawah ini menunjukkan di mana kami paling
                        aktif, siap menjadi partner media untuk event Anda.
                    </p>
                </div>

                {{-- Di sini Peta Interaktif Anda akan ditampilkan --}}
                <div id="interactive-map" class="bg-gray-700 flex items-center justify-center text-white rounded-lg">
                    Memuat Peta Infografis...
                </div>

                <p class="text-center text-gray-600 mt-8">
                    Event Anda berada di luar area ini? Jangan khawatir! Jangkauan kami terus berkembang. <a
                        href="{{ route('pages.kontak') }}" class="text-blue-600 hover:underline font-semibold">Hubungi
                        kami</a> untuk mendiskusikan kemungkinan liputan dan kerjasama di kota Anda.
                </p>
            </section>

        </div>
    </div>

    {{-- ================================================== --}}
    {{-- 5. Mari Berkolaborasi: Call to Action (CTA) --}}
    {{-- ================================================== --}}
    <section class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-16 md:py-24 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-8">
                Punya Cerita untuk Diabadikan?
            </h2>
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto text-left">
                {{-- Kolom untuk Event Organizer --}}
                <div class="bg-gray-700 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold mb-3">Untuk Event Organizer & Brand</h3>
                    <p class="mb-6">
                        Jadikan event Anda sorotan utama. Kami menawarkan paket media partnership, liputan foto & video,
                        serta promosi yang menjangkau ribuan audiens tertarget. Mari ciptakan dampak bersama.
                    </p>
                </div>
                {{-- Kolom untuk Komunitas --}}
                <div class="bg-gray-700 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold mb-3">Untuk Komunitas & Kreator</h3>
                    <p class="mb-6">
                        Apakah komunitasmu punya acara keren? Atau kamu seorang cosplayer/kreator dengan karya yang
                        ingin diliput? Kami selalu mencari cerita menarik untuk diangkat.
                    </p>
                </div>
            </div>
            <div class="mt-10">
                <a href="{{ route('pages.kontak') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full text-lg transition duration-300">
                    Diskusikan Proyek Anda
                </a>
            </div>
        </div>
    </section>

    {{-- Menambahkan JavaScript khusus untuk halaman ini --}}
    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script>
            // Menunggu hingga seluruh konten halaman dimuat
            document.addEventListener('DOMContentLoaded', function () {
                // Data kota yang sama dari kode React Anda
                const citiesToDisplay = [
                    { id: "jaktim", name: "JAKARTA TIMUR", lat: -6.2452, lng: 106.8994, pinColor: "#FF6384" },
                    { id: "jakpus", name: "JAKARTA PUSAT", lat: -6.1751, lng: 106.8272, pinColor: "#36A2EB" },
                    { id: "jakut", name: "JAKARTA UTARA", lat: -6.1381, lng: 106.864, pinColor: "#FFCE56" },
                    { id: "jaksel", name: "JAKARTA SELATAN", lat: -6.2615, lng: 106.8106, pinColor: "#4BC0C0" },
                    { id: "jakbar", name: "JAKARTA BARAT", lat: -6.1676, lng: 106.7635, pinColor: "#9966FF" },
                    { id: "kotabekasi", name: "KOTA BEKASI", lat: -6.2383, lng: 106.9756, pinColor: "#FF9F40" },
                    { id: "kabbekasi", name: "KAB. BEKASI", lat: -6.27, lng: 107.15, pinColor: "#C9CBCF" },
                    { id: "denpasar", name: "DENPASAR", lat: -8.6705, lng: 115.2126, pinColor: "#E7E9ED" },
                ];

                // Inisialisasi peta pada div #interactive-map
                // Center view di sekitar Jakarta
                const map = L.map('interactive-map').setView([-6.25, 106.85], 10);

                // Menambahkan layer peta (tile layer), menggunakan tema gelap agar sesuai
                L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                    subdomains: 'abcd',
                    maxZoom: 20
                }).addTo(map);

                // Loop melalui data kota dan tambahkan marker ke peta
                citiesToDisplay.forEach(city => {
                    // Membuat SVG Icon kustom untuk pin dengan warna yang spesifik
                    const svgIcon = L.divIcon({
                        html: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="${city.pinColor}">
                            <path d="M12 0C7.589 0 4 3.589 4 8c0 4.411 8 16 8 16s8-11.589 8-16c0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"/>
                           </svg>`,
                        className: "", // Hapus class default
                        iconSize: [32, 32],
                        iconAnchor: [16, 32], // Titik pin berada di bawah tengah
                        popupAnchor: [0, -32] // Posisi popup relatif terhadap icon anchor
                    });

                    L.marker([city.lat, city.lng], { icon: svgIcon })
                        .addTo(map)
                        .bindPopup(`<b>${city.name}</b>`);
                });
            });
        </script>
    @endpush
</x-app-layout>