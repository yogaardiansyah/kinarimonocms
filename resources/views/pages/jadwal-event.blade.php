<x-app-layout title="Kinarimono - Your Partner in Weebs Community">
    <main class="py-8 px-4 md:px-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 text-center">
                Jadwal Event by J-Fest Chart
            </h1>

            @if($error)
                <div class="flex justify-center items-center h-40 text-red-500">
                    Terjadi kesalahan: {{ $error }}
                </div>
            @else
                {{-- Form untuk filter --}}
                <form method="GET" action="{{ url('/jadwal-event') }}" class="mb-6 flex justify-center sm:justify-start">
                    <div>
                        <label for="area-filter" class="block text-sm font-medium text-gray-700 mb-1">
                            Filter Area:
                        </label>
                        <select id="area-filter" name="area" onchange="this.form.submit()" {{-- Otomatis submit saat pilihan
                            berubah --}}
                            class="p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm w-full sm:w-auto">
                            <option value="">Semua Area</option>
                            @foreach($areas as $area)
                                <option value="{{ $area }}" @if($area === $selectedArea) selected @endif>
                                    {{ $area }}
                                </option>
                            @endforeach
                        </select>
                        @if($areas->isEmpty())
                            <p class="text-xs text-red-500 mt-1">
                                Tidak ada data area ditemukan dalam spreadsheet.
                            </p>
                        @endif
                    </div>
                </form>

                @if($events->isNotEmpty())
                    @foreach($events as $event)
                        <div class="flex flex-col sm:flex-row sm:items-center py-4 border-b border-gray-300 last:border-b-0">
                            <div class="w-full sm:w-24 md:w-28 flex-shrink-0 mb-2 sm:mb-0">
                                <p class="text-sm font-medium text-gray-700">
                                    {{-- Format tanggal: 24.09.23 --}}
                                    {{ $event['tanggal']->format('d.m.y') }}
                                </p>
                            </div>
                            <a href="{{ $event['link_acara'] }}" target="_blank" rel="noopener noreferrer"
                                class="order-last sm:order-none self-start sm:self-center my-2 sm:my-0 sm:mx-4 flex-shrink-0 inline-block text-xs font-semibold text-black bg-white hover:bg-gray-100 border border-gray-400 rounded-md px-3 py-1.5 transition-colors duration-150">
                                MORE INFO
                            </a>
                            <div class="flex-grow">
                                <p class="text-base md:text-lg font-semibold text-black">
                                    {{ $event['nama_acara'] }}
                                    @if($event['lokasi'])
                                        @ {{ $event['lokasi'] }}
                                    @endif
                                    @if($event['area'])
                                        <span class="text-sm text-gray-600">
                                            (Area: {{ $event['area'] }})
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-10 text-gray-500">
                        @if($selectedArea)
                            Tidak ada event mendatang di area {{ $selectedArea }}.
                        @else
                            Tidak ada event mendatang saat ini.
                        @endif
                    </div>
                @endif
            @endif
        </div>
    </main>
</x-app-layout>