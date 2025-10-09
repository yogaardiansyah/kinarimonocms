{{-- 
    Struktur ini mengasumsikan Anda memiliki komponen layout di:
    /resources/views/components/app.blade.php atau /resources/views/layouts/app.blade.php
    dan Anda memanggilnya sebagai <x-app> atau <x-layouts.app>
--}}

<x-app-layout>

    {{-- Slot untuk Judul Halaman (Title) --}}
    {{-- Nama slot 'title' atau 'header' mungkin perlu disesuaikan --}}
    {{-- tergantung pada bagaimana komponen layout Anda dibuat. --}}
    <x-slot name="title">
        Prinsip & Kode Etik Komunitas Kinarimono
    </x-slot>

    {{-- Konten utama halaman sekarang berada langsung di dalam komponen --}}

    {{-- ================================================== --}}
    {{-- 1. Hero Section: Pernyataan Misi --}}
    {{-- ================================================== --}}
    <section class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Kompas Komunitas Kinarimono
            </h1>
            <p class="text-lg md:text-xl max-w-3xl mx-auto text-white/80">
                Ini bukan sekadar aturan, melainkan fondasi dari semua yang kita lakukan. Panduan ini memastikan Kinarimono tetap menjadi ruang yang positif, kreatif, dan terhormat bagi tim kami dan seluruh komunitas yang kami layani.
            </p>
        </div>
    </section>

    {{-- ================================================== --}}
    {{-- 2. Konten Utama --}}
    {{-- ================================================== --}}
    <div class="bg-white">
        <div class="container mx-auto px-4 py-16 md:py-24">

            {{-- Bagian Pengantar --}}
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Pilar Utama Kami</h2>
                <p class="text-gray-600 leading-relaxed">
                    Setiap anggota tim Kinarimono, dari kontributor baru hingga pendiri, diharapkan untuk memahami, menghayati, dan menjunjung tinggi empat pilar utama yang membentuk identitas kita. Pilar-pilar ini adalah cerminan dari "The Kinarimono Way".
                </p>
            </div>

            {{-- Grid untuk 4 Pilar Utama --}}
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto mb-20">
                
                {{-- Pilar 1: Passion Driven --}}
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">1. Digerakkan oleh Passion</h3>
                    <p class="text-gray-600">
                        Kami ada karena kami mencintai budaya pop Jepang dan komunitasnya. Setiap liputan, tulisan, dan interaksi kami lahir dari semangat otentik. Kami bukan hanya peliput; kami adalah penggemar. Ini berarti kami selalu berusaha memberikan yang terbaik untuk merepresentasikan hobi yang kita cintai ini secara positif.
                    </p>
                </div>

                {{-- Pilar 2: Saling Menghargai --}}
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">2. Rasa Hormat adalah Segalanya</h3>
                    <p class="text-gray-600">
                        Rasa hormat adalah mata uang utama dalam komunitas. Ini berlaku untuk semua orang, tanpa terkecuali: sesama anggota tim, penyelenggara event, guest star, cosplayer, fotografer lain, dan setiap pengunjung yang kami temui. Kami mendengarkan, kami menghargai karya, dan kami berinteraksi dengan sopan.
                    </p>
                </div>

                {{-- Pilar 3: Inisiatif & Kreatif --}}
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">3. Inisiatif & Kreativitas</h3>
                    <p class="text-gray-600">
                        Kami tidak menunggu untuk diberi tahu apa yang harus dilakukan. Kami secara proaktif mencari cerita, menemukan sudut pandang yang unik, dan bereksperimen dengan cara-cara baru untuk meliput. Setiap anggota didorong untuk menyumbangkan ide dan mengambil peran aktif dalam pertumbuhan Kinarimono.
                    </p>
                </div>

                {{-- Pilar 4: Kerja Sama Tim --}}
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">4. Satu Tim, Satu Visi</h3>
                    <p class="text-gray-600">
                        Karya terbaik lahir dari kolaborasi. Kami saling mendukung di lapangan, berbagi ilmu, memberikan kritik yang membangun, dan merayakan keberhasilan bersama. Ego pribadi dikesampingkan demi tujuan yang lebih besar: mengabadikan dan mengangkat komunitas kita.
                    </p>
                </div>
            </div>

            <hr class="my-16">

            {{-- Bagian Kode Etik / Peraturan Praktis --}}
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Kode Etik & Peraturan Praktis</h2>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Saat Meliput di Event:</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li><strong>Identitas Jelas:</strong> Selalu kenakan identitas Kinarimono (ID card/seragam) saat bertugas.</li>
                            <li><strong>Profesionalisme:</strong> Bersikap sopan dan ramah kepada semua pihak. Ingat, Anda membawa nama baik Kinarimono.</li>
                            <li><strong>Minta Izin:</strong> Selalu minta izin sebelum memotret cosplayer atau individu secara close-up. Hargai jika mereka menolak.</li>
                            <li><strong>Jangan Menghalangi:</strong> Sadari lingkungan sekitar. Jangan menghalangi jalan, pandangan penonton lain, atau kru event.</li>
                            <li><strong>Jaga Kebersihan:</strong> Tinggalkan lokasi liputan dalam keadaan bersih seperti saat Anda datang.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Integritas Konten:</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li><strong>Kredit yang Tepat:</strong> Selalu berikan kredit (credit/tag) kepada cosplayer, fotografer, atau kreator yang karyanya ditampilkan.</li>
                            <li><strong>Tidak Ada Plagiarisme:</strong> Semua konten tulisan harus orisinal. Jika mengutip, sebutkan sumbernya dengan jelas.</li>
                            <li><strong>Representasi yang Jujur:</strong> Sajikan informasi dan liputan secara akurat. Hindari clickbait atau narasi yang dapat menimbulkan citra negatif.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Komunikasi Internal:</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li><strong>Responsif:</strong> Tanggapi komunikasi di grup internal secara tepat waktu.</li>
                            <li><strong>Diskusi yang Sehat:</strong> Perbedaan pendapat adalah hal biasa. Sampaikan dengan cara yang konstruktif dan fokus pada solusi, bukan menyalahkan.</li>
                            <li><strong>Kerahasiaan:</strong> Jaga kerahasiaan informasi dan diskusi internal tim.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ================================================== --}}
    {{-- 3. Call to Action (CTA) --}}
    {{-- ================================================== --}}
    <section class="bg-gray-100">
        <div class="container mx-auto px-4 py-16 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Merasa Sevisi dengan Kami?</h2>
            <p class="max-w-2xl mx-auto text-gray-600 mb-8">
                Jika Anda membaca ini dan merasa semangat Anda sejalan dengan nilai-nilai kami, mungkin Anda adalah orang yang kami cari.
            </p>
            <a href="" {{-- Ganti 'community.join' dengan nama rute halaman pendaftaran Anda --}}
               class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-full text-lg transition duration-300 inline-block">
                Gabung dengan Tim Kami
            </a>
        </div>
    </section>

</x-app-layout>