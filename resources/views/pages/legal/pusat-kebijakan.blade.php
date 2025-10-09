<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pusat Bantuan & Kebijakan
        </h2>
    </x-slot>

    {{-- ================================================== --}}
    {{-- 1. Hero Section --}}
    {{-- ================================================== --}}
    <section class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Pusat Bantuan & Kebijakan
            </h1>
            <p class="text-lg md:text-xl max-w-3xl mx-auto text-white/80">
                Transparansi adalah kunci kepercayaan. Di sini Anda dapat menemukan semua panduan, aturan, dan kebijakan yang membentuk ekosistem Kinarimono yang aman, adil, dan kreatif.
            </p>
        </div>
    </section>

    {{-- ================================================== --}}
    {{-- 2. Konten Utama - Panduan Kebijakan --}}
    {{-- ================================================== --}}
    <div class="bg-white">
        <div class="container mx-auto px-4 py-16 md:py-24">

            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Panduan Dokumen Kami</h2>
                <p class="text-gray-600 leading-relaxed">
                    Setiap dokumen memiliki tujuan spesifik untuk melindungi Anda, komunitas, dan kami. Pilih panduan yang paling sesuai dengan pertanyaan atau kebutuhan Anda.
                </p>
            </div>

            {{-- Grid untuk berbagai tipe halaman legal --}}
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm flex flex-col">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">Prinsip & Kode Etik Komunitas</h3>
                    <p class="text-gray-600 flex-grow">
                        Ini adalah "jiwa" dari tim kami. Baca ini untuk memahami nilai-nilai inti yang kami junjung tinggi.
                    </p>
                    {{-- DIUBAH --}}
                    <a href="{{ route('pages.prinsip-komunitas') }}" class="mt-6 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-5 rounded-full transition self-start">
                        Pelajari Nilai Kami
                    </a>
                </div>

                <div class="bg-gray-50 p-8 rounded-lg shadow-sm flex flex-col">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">Syarat Layanan & Kebijakan Privasi</h3>
                    <p class="text-gray-600 flex-grow">
                        Aturan main dasar untuk pengguna website dan penjelasan bagaimana kami menangani data pribadi Anda.
                    </p>
                    {{-- DIUBAH --}}
                    <a href="{{ route('pages.legal.syarat-ketentuan') }}" class="mt-6 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-5 rounded-full transition self-start">
                        Baca Syarat & Ketentuan
                    </a>
                </div>

                <div class="bg-gray-50 p-8 rounded-lg shadow-sm flex flex-col">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">Kebijakan Hak Cipta Aset</h3>
                    <p class="text-gray-600 flex-grow">
                        Panduan penting tentang cara menggunakan foto dan video dari liputan kami secara adil dan legal.
                    </p>
                    {{-- DIUBAH --}}
                    <a href="{{ route('pages.legal.kebijakan-hak-cipta') }}" class="mt-6 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-5 rounded-full transition self-start">
                        Lihat Kebijakan Aset
                    </a>
                </div>

                <div class="bg-gray-50 p-8 rounded-lg shadow-sm flex flex-col">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">Kebijakan Penurunan Konten</h3>
                    <p class="text-gray-600 flex-grow">
                        Prosedur langkah-demi-langkah untuk melaporkan pelanggaran hak cipta atas karya Anda.
                    </p>
                    {{-- DIUBAH --}}
                    <a href="{{ route('pages.legal.penurunan-konten') }}" class="mt-6 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-5 rounded-full transition self-start">
                        Ajukan Laporan
                    </a>
                </div>

                <div class="bg-gray-50 p-8 rounded-lg shadow-sm flex flex-col">
                    <h3 class="text-2xl font-semibold text-purple-700 mb-3">Pelaporan & Moderasi Komunitas</h3>
                    <p class="text-gray-600 flex-grow">
                        Cara melaporkan perilaku buruk untuk menjaga komunitas kita tetap aman dan positif.
                    </p>
                    {{-- DIUBAH --}}
                    <a href="{{ route('pages.legal.pelaporan-komunitas') }}" class="mt-6 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-5 rounded-full transition self-start">
                        Laporkan Perilaku
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>