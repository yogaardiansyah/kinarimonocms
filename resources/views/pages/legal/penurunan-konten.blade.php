<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Pelanggaran Hak Cipta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <div class="prose max-w-none mb-8">
                        <h1>Formulir Laporan Pelanggaran Hak Cipta (Takedown)</h1>
                        <p>Jika Anda adalah pemilik hak cipta dan yakin bahwa karya Anda telah digunakan di situs kami tanpa izin, silakan lengkapi formulir di bawah ini. Laporan yang valid dan lengkap akan kami proses dengan segera.</p>
                    </div>

                    {{-- Arahkan 'action' ke rute yang akan memproses formulir --}}
                    <form action="" method="POST" class="space-y-6">
                        @csrf

                        {{-- Informasi Pelapor --}}
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Informasi Kontak Anda</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="reporter_name" class="block text-sm font-medium text-gray-700">Nama Lengkap Anda</label>
                                    <input type="text" name="reporter_name" id="reporter_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="reporter_email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                                    <input type="email" name="reporter_email" id="reporter_email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                        </div>

                        {{-- Detail Pelanggaran --}}
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Detail Pelanggaran</h3>
                            <div>
                                <label for="original_work" class="block text-sm font-medium text-gray-700">
                                    Tautan atau Deskripsi Karya Asli Anda
                                </label>
                                <textarea name="original_work" id="original_work" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: https://instagram.com/p/xxxx atau deskripsi foto yang Anda ambil di event Y."></textarea>
                                <p class="mt-1 text-xs text-gray-500">Sertakan tautan ke karya asli Anda (di media sosial, portofolio, dll) atau berikan deskripsi yang jelas.</p>
                            </div>
                            <div class="mt-4">
                                <label for="infringing_url" class="block text-sm font-medium text-gray-700">
                                    Tautan URL Konten yang Melanggar di Situs Kami
                                </label>
                                <input type="url" name="infringing_url" id="infringing_url" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="https://kinarimono.com/liputan/event-abc/gallery-1">
                            </div>
                        </div>

                        {{-- Pernyataan Hukum --}}
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Pernyataan Hukum</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <input id="good_faith" name="good_faith" type="checkbox" required class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="good_faith" class="ml-3 text-sm text-gray-700">
                                        Saya menyatakan dengan niat baik bahwa penggunaan materi yang dilaporkan tidak diizinkan oleh pemilik hak cipta, agennya, atau hukum.
                                    </label>
                                </div>
                                <div class="flex items-start">
                                    <input id="accuracy" name="accuracy" type="checkbox" required class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="accuracy" class="ml-3 text-sm text-gray-700">
                                        Saya menyatakan bahwa informasi dalam laporan ini akurat, dan di bawah hukuman sumpah palsu, saya adalah pemilik hak cipta atau berwenang untuk bertindak atas nama pemilik.
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Tanda Tangan & Tombol Submit --}}
                        <div>
                            <label for="signature" class="block text-sm font-medium text-gray-700">Tanda Tangan Elektronik (Ketik Nama Lengkap Anda)</label>
                            <input type="text" name="signature" id="signature" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ketik nama lengkap Anda di sini">
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Kirim Laporan
                            </button>
                        </div>
                    </form>

                    <div class="prose max-w-none mt-12">
                        <h2>Tindakan Kami</h2>
                        <p>Setelah menerima laporan yang valid melalui formulir ini, tim kami akan meninjau klaim tersebut. Jika terbukti terjadi pelanggaran, kami akan segera menghapus atau menonaktifkan akses ke materi tersebut dan memberi Anda notifikasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>