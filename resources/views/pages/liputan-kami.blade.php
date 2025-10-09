<x-app-layout title="Kinarimono - Your Partner in Weebs Community">
   <div class="min-h-screen py-12 px-6 md:px-12" style="background-image: url('{{ asset('images/background/bg-pattern.svg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">

        <div class="max-w-7xl mx-auto">
            
            {{-- Bagian Header --}}
            <header class="text-center mb-12 md:mb-16">
                <h1 class="text-4xl md:text-6xl font-black uppercase tracking-wide bg-gradient-to-r from-cyan-400 via-purple-500 to-pink-500 bg-clip-text text-transparent mb-4">
                    Jejak Liputan Kami
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
                    Sebagai media partner resmi, Kinarimono bangga telah menjadi bagian dari keseruan event-event jejepangan terbesar. Kami hadir untuk mengabadikan momen dan menyebarkan semangatnya!
                </p>
            </header>

            {{-- Grid Portofolio Event --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                {{-- == CONTOH KARTU EVENT 1 == --}}
                {{-- Duplikasi blok ini untuk setiap event yang pernah diliput --}}
                <div class="group bg-gray-800 border border-white/10 rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-cyan-500/20">
                    {{-- Gambar / Poster Event --}}
                    <div class="aspect-w-4 aspect-h-5">
                        {{-- GANTI 'src' dengan poster event --}}
                        <img src="https://via.placeholder.com/400x500.png?text=POSTER+EVENT+XYZ" 
                             alt="Poster Event XYZ" 
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    
                    {{-- Detail Event --}}
                    <div class="p-5">
                        <p class="text-sm text-gray-400 mb-1">15-16 Nov 2025</p>
                        <h3 class="text-xl font-bold text-white truncate mb-4">Comic Frontier 21</h3>
                        {{-- GANTI 'href' dengan link ke artikel/video liputan Anda --}}
                        <a href="#" class="inline-block w-full text-center bg-cyan-500 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 hover:bg-cyan-400">
                            Lihat Liputan Kami
                        </a>
                    </div>
                </div>
                {{-- == AKHIR CONTOH KARTU == --}}

                {{-- CONTOH 2 --}}
                <div class="group bg-gray-800 border border-white/10 rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-purple-500/20">
                    <div class="aspect-w-4 aspect-h-5">
                        <img src="https://via.placeholder.com/400x500.png?text=JAK-JAPAN+MATSURI" alt="Poster Jak-Japan Matsuri" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-400 mb-1">27-28 Sep 2025</p>
                        <h3 class="text-xl font-bold text-white truncate mb-4">Jak-Japan Matsuri 2025</h3>
                        <a href="#" class="inline-block w-full text-center bg-purple-500 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 hover:bg-purple-400">
                            Lihat Liputan Kami
                        </a>
                    </div>
                </div>

                {{-- CONTOH 3 --}}
                 <div class="group bg-gray-800 border border-white/10 rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-pink-500/20">
                    <div class="aspect-w-4 aspect-h-5">
                        <img src="https://via.placeholder.com/400x500.png?text=INACON" alt="Poster INACON" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-400 mb-1">25-26 Okt 2025</p>
                        <h3 class="text-xl font-bold text-white truncate mb-4">Indonesia Anime Con</h3>
                        <a href="#" class="inline-block w-full text-center bg-pink-500 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 hover:bg-pink-400">
                            Lihat Liputan Kami
                        </a>
                    </div>
                </div>
                
                {{-- CONTOH 4 --}}
                 <div class="group bg-gray-800 border border-white/10 rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-amber-500/20">
                    <div class="aspect-w-4 aspect-h-5">
                        <img src="https://via.placeholder.com/400x500.png?text=COMIPARA+5" alt="Poster Comipara" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-400 mb-1">18-19 Okt 2025</p>
                        <h3 class="text-xl font-bold text-white truncate mb-4">Comic Paradise 5</h3>
                        <a href="#" class="inline-block w-full text-center bg-amber-500 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 hover:bg-amber-400">
                            Lihat Liputan Kami
                        </a>
                    </div>
                </div>
                
                {{-- ... Teruskan duplikasi untuk event lainnya ... --}}

            </div>

            {{-- Bagian Ajakan untuk Kolaborasi (Call to Action) --}}
            <section class="mt-16 md:mt-24 max-w-4xl mx-auto bg-white/5 p-8 rounded-xl border border-white/10 text-center">
                <h2 class="text-3xl font-bold mb-4">Jadikan Kinarimono Media Partner Anda!</h2>
                <p class="text-gray-300 mb-6">Selenggarakan event jejepangan? Kami siap membantu meliput dan mempromosikan acara Anda ke audiens yang tepat. Mari berkolaborasi untuk menyukseskan event Anda berikutnya.</p>
                <a href="mailto:partnership@kinarimono.com" class="inline-block bg-white text-gray-900 font-bold py-3 px-8 rounded-lg hover:bg-gray-200 transition-colors duration-300">
                    Ajukan Kemitraan
                </a>
            </section>
        </div>
    </div>  
</x-app-layout>