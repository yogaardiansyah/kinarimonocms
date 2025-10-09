<x-app-layout>
        {{-- Latar belakang dengan pola subtle untuk estetika tambahan --}}
    <div class="min-h-screen flex items-center justify-center py-12 px-6 md:px-12" style="background-image: url('{{ asset('images/background/bg-pattern.svg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">

        <div class="max-w-6xl w-full mx-auto bg-gray-800/50 backdrop-blur-md border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
            {{-- Tata letak Grid: 1 kolom di mobile, 2 kolom di desktop --}}
            <div class="grid md:grid-cols-2">
                
                {{-- Bagian Kiri: Informasi Kontak --}}
                <div class="p-8 md:p-12">
                    <h1 class="text-4xl md:text-5xl font-black bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent mb-4">
                        Hubungi Kami
                    </h1>
                    <p class="text-lg text-gray-300 mb-8">
                        Punya pertanyaan, saran, atau ingin berkolaborasi? Kami akan senang mendengarnya darimu. Isi form di samping atau hubungi kami melalui kanal di bawah ini.
                    </p>

                    <div class="space-y-6">
                        {{-- Info Email --}}
                        <div class="flex items-center space-x-4">
                            <div class="bg-white/10 p-3 rounded-full">
                                {{-- Ikon SVG untuk email --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold">Email</h4>
                                <a href="mailto:kontak@kinarimono.com" class="text-cyan-400 hover:text-cyan-300 transition-colors">kontak@kinarimono.com</a>
                            </div>
                        </div>
                        
                        {{-- Info Media Sosial --}}
                        <div>
                            <h4 class="text-lg font-bold mb-4">Temukan Kami Di Sini</h4>
                            <div class="flex space-x-4">
                                {{-- Ganti href dengan link media sosial Anda --}}
                                <a href="#" class="bg-white/10 p-3 rounded-full transition-colors hover:bg-white/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" /></svg> {{-- X / Twitter --}}
                                </a>
                                <a href="#" class="bg-white/10 p-3 rounded-full transition-colors hover:bg-white/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.012 3.584-.07 4.85c-.148 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.85s.012-3.584.07-4.85c.148-3.225 1.664-4.771 4.919-4.919C8.416 2.175 8.796 2.163 12 2.163m0-1.041c-3.268 0-3.66.014-4.944.072C2.694 1.346.856 3.184.629 7.954.572 9.238.558 9.628.558 12.001s.014 2.763.072 4.046c.228 4.77 2.066 6.608 6.732 6.834 1.284.058 1.676.072 4.944.072s3.66-.014 4.944-.072c4.666-.226 6.504-2.064 6.732-6.834.058-1.283.072-1.676.072-4.944s-.014-3.66-.072-4.944c-.228-4.77-2.066-6.608-6.732-6.834C15.66 1.133 15.269 1.121 12 1.121z M12 5.925a6.075 6.075 0 100 12.15 6.075 6.075 0 000-12.15z m0 1.041a5.034 5.034 0 110 10.068 5.034 5.034 0 010-10.068z M18.156 5.253a1.518 1.518 0 10-2.148 2.147 1.518 1.518 0 002.148-2.147z" /></svg> {{-- Instagram --}}
                                </a>
                                <a href="#" class="bg-white/10 p-3 rounded-full transition-colors hover:bg-white/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.35C0 23.407.593 24 1.325 24H12.82v-9.29h-3.128v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116c.732 0 1.325-.593 1.325-1.325V1.325C24 .593 23.407 0 22.675 0z" /></svg> {{-- Facebook --}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bagian Kanan: Formulir Kontak --}}
                <div class="p-8 md:p-12 bg-black/20">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf {{-- Penting untuk keamanan di Laravel --}}

                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-300 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required class="w-full bg-gray-900 border border-white/20 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 transition-all">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-300 mb-2">Alamat Email</label>
                            <input type="email" id="email" name="email" required class="w-full bg-gray-900 border border-white/20 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 transition-all">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-bold text-gray-300 mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject" required class="w-full bg-gray-900 border border-white/20 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 transition-all">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-gray-300 mb-2">Pesan Anda</label>
                            <textarea id="message" name="message" rows="5" required class="w-full bg-gray-900 border border-white/20 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 transition-all"></textarea>
                        </div>
                        
                        <div>
                            <button type="submit" class="w-full bg-cyan-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-cyan-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-cyan-500 transition-all duration-300">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>