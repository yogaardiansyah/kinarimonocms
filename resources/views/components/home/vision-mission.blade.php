{{-- resources/views/components/vision-mission.blade.php --}}

@php
    $pageBackgroundImage = asset('images/background/bg_about.webp');
    $mascotImage = asset('images/mascot/kirara_art.webp');
@endphp

<div
    class="flex flex-col md:flex-row w-full min-h-screen bg-cover bg-center overflow-hidden"
    style="background-image: url('{{ $pageBackgroundImage }}')"
>
    {{-- Bagian Kiri: Gambar Maskot --}}
    {{-- Di mobile, urutan ke-2 (muncul di bawah teks). Di desktop, urutan ke-1 (di kiri). --}}
    <div class="w-full md:w-[60%] lg:w-[65%] h-screen relative order-2 md:order-1">
        {{--
            Replikasi dari next/image layout="fill"
            Parent harus 'relative', dan image ini 'absolute inset-0'
        --}}
        <img
            src="{{ $mascotImage }}"
            alt="Mascot Kinarimono Kirara"
            class="absolute inset-0 w-full h-full object-cover transform scale-150"
            style="object-position: 0% 25%;" {{-- Disesuaikan dari '0px 8rem' untuk lebih responsif --}}
        />
    </div>

    {{-- Bagian Kanan: Teks Visi & Misi --}}
    {{-- Di mobile, urutan ke-1 (muncul di atas gambar). Di desktop, urutan ke-2 (di kanan). --}}
    <div class="w-full md:w-[40%] lg:w-[35%] min-h-[50vh] sm:min-h-[40vh] md:h-screen p-6 sm:p-10 md:p-10 lg:p-12 xl:p-16 relative order-1 md:order-2 flex flex-col justify-center text-white">

        {{-- Judul "Tentang Kami" yang Melayang --}}
        <div class="w-full flex justify-center md:justify-end mb-6 md:mb-0 md:absolute md:top-[60px] md:right-[50px] lg:top-[70px] lg:right-[60px] xl:top-[80px] xl:right-[70px] z-10">
            <div class="relative inline-block group">
                {{-- Efek bayangan yang bergerak saat hover --}}
                <span
                    class="absolute inset-0 bg-purple-700/70 rounded-lg transform translate-x-1 translate-y-1 sm:translate-x-1.5 sm:translate-y-1.5 transition-transform duration-150 ease-in-out group-hover:translate-x-0.5 group-hover:translate-y-0.5"
                    aria-hidden="true"
                ></span>
                {{-- Teks utama --}}
                <span
                    class="relative block bg-purple-500 text-white font-black text-xl sm:text-3xl md:text-5xl px-6 py-2 sm:px-7 sm:py-2.5 rounded-lg shadow-md transition-transform duration-150 ease-in-out group-hover:-translate-x-0.5 group-hover:-translate-y-0.5"
                >
                    Tentang Kami
                </span>
            </div>
        </div>

        {{-- Kontainer untuk paragraf teks, diposisikan di tengah vertikal --}}
        <div class="w-full max-w-xl md:max-w-none mx-auto">
            {{--
                Ganti teks placeholder Lorem Ipsum dengan visi & misi Kinarimono.
                Saya berikan contoh teks yang relevan.
            --}}
            <p class="text-justify text-base sm:text-lg leading-relaxed mb-6 font-semibold backdrop-blur-sm p-2 rounded-md bg-black/10">
                Kinarimono lahir dari semangat murni untuk merayakan dan menyatukan komunitas penggemar budaya pop Jepang di Indonesia. Kami percaya bahwa setiap event, setiap karya, dan setiap interaksi adalah bagian dari sebuah cerita besar. Misi kami adalah menjadi partner tepercaya Anda dalam mengabadikan dan menyebarkan setiap momen berharga tersebut.
            </p>
            <p class="text-justify text-base sm:text-lg leading-relaxed font-semibold backdrop-blur-sm p-2 rounded-md bg-black/10">
                Visi kami adalah menjadi platform media utama yang paling informatif, inspiratif, dan terkoneksi dengan audiensnya. Melalui liputan yang mendalam dan jadwal event yang akurat, kami berupaya menjadi jembatan yang menghubungkan kreator, penyelenggara acara, dan para fans di seluruh nusantara.
            </p>
        </div>
    </div>
</div>