{{-- resources/views/components/layout.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Judul halaman dinamis, dengan judul default jika tidak disediakan --}}
  <title>{{ $title ?? 'Kinarimono' }}</title>

  {{-- Menggunakan Vite untuk memuat aset CSS dan JS (standar Laravel 10+) --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Syncopate:wght@400;700&display=swap");

    @theme {
      --font-sans: "Inter", sans-serif;
    }

    @layer utilities {
      .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
      }

      .no-scrollbar::-webkit-scrollbar {
        display: none;
      }

      html {
        -ms-overflow-style: none;
        scrollbar-width: none;
      }

      html::-webkit-scrollbar {
        display: none;
      }
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">

  {{-- Anda bisa meletakkan header/navbar global di sini --}}
  {{-- <x-navbar /> --}}
  <x-header communityName="Kinarimono Event Hub" />
  <main>
    {{-- Di sinilah konten dari setiap halaman akan disuntikkan --}}
    {{ $slot }}
  </main>

  <x-footer tagline="Partner Tepercaya Komunitas Jejepangan Indonesia" />

</body>

</html>