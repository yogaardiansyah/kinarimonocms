{{-- resources/views/components/vision-mission.blade.php --}}

@php
    $pageBackgroundImage = asset('images/background/bg_about.webp');
    $mascotImage = asset('images/mascot/kirara_art.webp');
@endphp

<div
    class="flex flex-col min-[768px]:flex-row w-full min-h-screen bg-cover bg-center overflow-hidden"
    style="background-image: url('{{ $pageBackgroundImage }}')"
>
    {{-- ================================================== --}}
    {{-- Bagian Kiri: Gambar Maskot --}}
    {{-- ================================================== --}}
    <div class="w-full min-[768px]:w-[60%] min-[1024px]:w-[65%] h-[60vh] min-[768px]:h-screen relative order-2 min-[768px]:order-1">
        <img
            src="{{ $mascotImage }}"
            alt="Mascot Kinarimono Kirara"
            class="absolute inset-0 w-full h-full object-cover transform scale-125 min-[768px]:scale-150"
            style="object-position: 0% 25%;"
        />
    </div>

    {{-- ================================================== --}}
    {{-- Bagian Kanan: Teks Visi & Misi --}}
    {{-- ================================================== --}}
    <div class="w-full min-[768px]:w-[40%] min-[1024px]:w-[35%] min-h-[40vh] min-[768px]:h-screen
                p-4 min-[425px]:p-6 min-[640px]:p-10 min-[1024px]:p-12 min-[1280px]:p-16
                relative order-1 min-[768px]:order-2 flex flex-col justify-center text-white">

        {{-- Judul "Tentang Kami" yang Melayang --}}
        <div class="w-full flex justify-center min-[768px]:justify-end mb-6 min-[768px]:mb-0 min-[768px]:absolute min-[768px]:top-[60px] min-[768px]:right-[50px] min-[1024px]:top-[70px] min-[1024px]:right-[60px] min-[1280px]:top-[80px] min-[1280px]:right-[70px] z-10">
            <div class="relative inline-block group">
                <span
                    class="absolute inset-0 bg-purple-700/70 rounded-lg transform translate-x-1 translate-y-1 transition-transform duration-150 ease-in-out group-hover:translate-x-0.5 group-hover:translate-y-0.5"
                    aria-hidden="true"
                ></span>
                <span
                    class="relative block bg-purple-500 text-white font-black
                           text-2xl min-[425px]:text-3xl min-[768px]:text-5xl
                           px-6 py-2 min-[425px]:px-7 min-[425px]:py-2.5
                           rounded-lg shadow-md transition-transform duration-150 ease-in-out group-hover:-translate-x-0.5 group-hover:-translate-y-0.5"
                >
                    Tentang Kami
                </span>
            </div>
        </div>

        {{-- Kontainer untuk paragraf teks --}}
        <div class="w-full max-w-xl min-[768px]:max-w-none mx-auto">
            {{-- PERUBAHAN KUNCI DI SINI --}}
            <p class="text-justify text-sm min-[425px]:text-base min-[768px]:text-base min-[1024px]:text-lg leading-relaxed mb-6 font-semibold backdrop-blur-sm p-2 rounded-md bg-black/10">
                Kinarimono lahir dari semangat murni untuk merayakan dan menyatukan komunitas penggemar budaya pop Jepang di Indonesia. Kami percaya bahwa setiap event, setiap karya, dan setiap interaksi adalah bagian dari sebuah cerita besar. Misi kami adalah menjadi partner tepercaya Anda dalam mengabadikan dan menyebarkan setiap momen berharga tersebut.
            </p>
            {{-- DAN DI SINI --}}
            <p class="text-justify text-sm min-[425px]:text-base min-[768px]:text-base min-[1024px]:text-lg leading-relaxed font-semibold backdrop-blur-sm p-2 rounded-md bg-black/10">
                Visi kami adalah menjadi platform media utama yang paling informatif, inspiratif, dan terkoneksi dengan audiensnya. Melalui liputan yang mendalam dan jadwal event yang akurat, kami berupaya menjadi jembatan yang menghubungkan kreator, penyelenggara acara, dan para fans di seluruh nusantara.
            </p>
        </div>
    </div>
</div>