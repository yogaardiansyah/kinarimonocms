{{-- resources/views/home.blade.php --}}

{{-- 
  - Memanggil komponen layout. Semua yang ada di dalam tag ini akan masuk ke variabel $slot.
  - Kita juga mengirimkan data 'title' ke komponen layout.
--}}
<x-app-layout title="Kinarimono - Your Partner in Weebs Community">

    {{-- Memanggil komponen hero section khusus untuk halaman home --}}
    <x-home.hero />

    {{-- Anda bisa menambahkan konten lain untuk halaman home di sini --}}
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-bold text-center mb-4">Konten Lainnya</h2>
        <p class="text-center">
            Ini adalah bagian lain dari halaman beranda Anda yang muncul setelah hero section.
        </p>
    </div>

</x-app-layout>