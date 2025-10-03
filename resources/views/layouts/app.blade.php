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

    <style>

    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Anda bisa meletakkan header/navbar global di sini --}}
    {{-- <x-navbar /> --}}

    <main>
        {{-- Di sinilah konten dari setiap halaman akan disuntikkan --}}
        {{ $slot }}
    </main>

    {{-- Anda bisa meletakkan footer global di sini --}}
    {{-- <x-footer /> --}}

</body>
</html>