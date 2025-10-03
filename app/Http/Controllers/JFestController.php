<?php

// app/Http/Controllers/JFestController.php

namespace App\Http\Controllers;

use App\Services\GoogleSheetService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Exception;

class JFestController extends Controller
{
    protected GoogleSheetService $sheetService;

    public function __construct(GoogleSheetService $sheetService)
    {
        $this->sheetService = $sheetService;
    }

    public function __invoke(Request $request)
    {
        $error = null;
        $allEvents = collect();

        try {
            $allEvents = collect($this->sheetService->getEvents());
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        // Ekstrak area unik untuk dropdown filter, sama seperti useMemo di React
        $areas = $allEvents->pluck('area')
            ->filter() // Hapus nilai kosong
            ->unique()
            ->sort()
            ->values();

        $selectedArea = $request->input('area', '');

        // Filter event, sama seperti useMemo di React
        $filteredEvents = $allEvents
            // Filter hanya event yang akan datang
            ->filter(function ($event) {
                return $event['tanggal']->isFuture() || $event['tanggal']->isToday();
            })
            // Filter berdasarkan area yang dipilih
            ->when($selectedArea, function (Collection $collection, $area) {
                return $collection->filter(function ($event) use ($area) {
                    return strtolower($event['area']) === strtolower($area);
                });
            })
            // Urutkan berdasarkan tanggal terdekat
            ->sortBy('tanggal');

        return view('pages.jadwal-event', [
            'events' => $filteredEvents,
            'areas' => $areas,
            'selectedArea' => $selectedArea,
            'error' => $error,
        ]);
    }
}