{{-- resources/views/components/join-community.blade.php --}}

@php
    $backgroundImage = asset('images/background/bg.jpg');
    $mascotImage = asset('images/mascot/kirara_ai1.webp');
@endphp

<section
    class="min-h-screen w-full bg-cover bg-center flex items-center justify-center p-6 md:p-12 lg:p-20"
    style="background-image: url('{{ $backgroundImage }}')"
>
    <div class="flex flex-col-reverse md:flex-row items-center justify-center w-full max-w-7xl gap-10">

        {{-- Kolom Kiri: Formulir Pendaftaran --}}
        <div class="flex-1 flex justify-center w-full">
            <div
                class="max-w-md w-full bg-white/10 backdrop-blur-md shadow-xl rounded-xl p-6 sm:p-8 md:p-10 text-white"
            >
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-semibold mb-4 text-left">
                    Join Our Community
                </h1>
                <p class="mb-6 text-sm sm:text-base opacity-90 text-left">
                    Dapatkan konten eksklusif, bagikan karyamu, dan terhubung dengan sesama antusias!
                </p>

                {{-- Arahkan 'action' ke rute yang sesuai untuk menangani pendaftaran --}}
                <form action="#" method="POST" class="space-y-5 text-left">
                    @csrf {{-- Penting untuk keamanan form di Laravel --}}

                    <div>
                        <label for="name" class="block text-sm font-medium mb-1 text-white/80">
                            Nama Kamu
                        </label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            placeholder="Masukkan namamu"
                            required
                            class="w-full p-3 border border-white/30 rounded-md 
                                   bg-white/20 text-white placeholder-white/60
                                   focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition"
                        />
                    </div>
                    
                    <div>
                        <label for="instagram" class="block text-sm font-medium mb-1 text-white/80">
                            Username Instagram
                        </label>
                        <input
                            id="instagram"
                            name="instagram"
                            type="text"
                            placeholder="@username"
                            required
                            class="w-full p-3 border border-white/30 rounded-md 
                                   bg-white/20 text-white placeholder-white/60
                                   focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition"
                        />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1 text-white/80">
                            Email Kamu
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="Masukkan emailmu"
                            required
                            class="w-full p-3 border border-white/30 rounded-md 
                                   bg-white/20 text-white placeholder-white/60
                                   focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition"
                        />
                    </div>
                    <button
                        type="submit"
                        class="w-full py-3 bg-purple-600 text-white font-semibold rounded-md 
                               hover:bg-purple-700 transition-colors
                               focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 
                               focus:ring-offset-gray-900" {{-- ring-offset disesuaikan untuk background gelap --}}
                    >
                        Join Now
                    </button>
                </form>

                <p class="mt-6 text-xs text-white/70 text-left">
                    Dengan bergabung, kamu setuju dengan Syarat & Ketentuan dan Kebijakan Privasi kami.
                </p>
            </div>
        </div>

        {{-- Kolom Kanan: Gambar Maskot --}}
        <div class="flex-1 flex justify-center items-center">
            <img
                src="{{ $mascotImage }}"
                alt="Kinarimono Mascot"
                class="w-full max-w-xl h-auto object-contain drop-shadow-2xl"
            />
        </div>

    </div>
</section>