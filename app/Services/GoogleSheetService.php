<?php
// app/Services/GoogleSheetService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class GoogleSheetService
{
    protected string $sheetId = '1RQ2PZMRKjBVHpG0ettmuiDjjxzpF7OfFDfXlJDT0ElE';
    protected string $csvUrl;

    public function __construct()
    {
        $this->csvUrl = "https://docs.google.com/spreadsheets/d/{$this->sheetId}/export?format=csv";
    }

    public function getEvents(): array
    {
        // Mengembalikan fungsi cache. Ini sudah benar.
        return Cache::remember('google_sheet_events', now()->addMinutes(15), function () {
            try {
                $response = Http::get($this->csvUrl);
                if (!$response->successful()) {
                    throw new Exception('Gagal mengambil data dari Google Sheet.');
                }
                return $this->parseCsv($response->body());
            } catch (Exception $e) {
                report($e);
                throw new Exception('Tidak dapat terhubung ke sumber data Google Sheet.');
            }
        });
    }

    protected function parseCsv(string $csvContent): array
    {
        $lines = explode(PHP_EOL, $csvContent);
        if (count($lines) < 2) return [];

        $headers = str_getcsv(array_shift($lines));
        $events = [];

        foreach ($lines as $line) {
            if (empty(trim($line))) continue;
            try {
                $row = @array_combine($headers, str_getcsv($line));
                if ($row === false) continue;

                $cleanedEvent = $this->cleanEventData($row);
                if ($cleanedEvent && !empty($cleanedEvent['nama_acara'])) {
                    $events[] = $cleanedEvent;
                }
            } catch (Exception $e) {
                // Lanjutkan ke baris berikutnya jika ada error
            }
        }
        return $events;
    }

    protected function cleanEventData(array $row): ?array
    {
        $namaAcara = $this->findValueByKey($row, ['Nama Acara']);
        $tanggal = $this->findValueByKey($row, ['Tanggal']);
        $lokasi = $this->findValueByKey($row, ['Lokasi']);
        $area = $this->findValueByKey($row, ['Area']);
        $linkAcara = $this->findValueByKey($row, ['Link Acara']);

        // Jangan proses baris instruksional atau baris tanpa tanggal
        if (str_contains($area, '-----') || empty($tanggal)) {
            return null;
        }

        // ===============================================================
        // PERUBAHAN KUNCI: Menggunakan helper baru untuk parsing tanggal
        // ===============================================================
        $eventDate = $this->parseIndonesianDate($tanggal);

        if (!$eventDate) {
            // Log jika helper baru pun gagal, untuk jaga-jaga
            Log::warning('GoogleSheetService: Gagal mem-parsing tanggal dengan metode baru.', [
                'date_string' => $tanggal
            ]);
            return null;
        }

        return [
            'tanggal' => $eventDate,
            'nama_acara' => trim($namaAcara),
            'lokasi' => trim($lokasi),
            'area' => trim($area),
            'link_acara' => trim($linkAcara),
        ];
    }

    /**
     * HELPER BARU: Mem-parsing tanggal dengan format "dd Mmm yyyy" (e.g., "04 Okt 2025")
     * tanpa bergantung pada locale server.
     */
    private function parseIndonesianDate(string $dateString): ?Carbon
    {
        $parts = explode(' ', $dateString);
        if (count($parts) !== 3) {
            return null;
        }

        [$day, $monthStr, $year] = $parts;

        // Kamus untuk menerjemahkan bulan Indonesia ke nomor
        $monthMap = [
            'jan' => 1, 'feb' => 2, 'mar' => 3, 'apr' => 4, 'mei' => 5, 'jun' => 6,
            'jul' => 7, 'agu' => 8, 'sep' => 9, 'okt' => 10, 'nov' => 11, 'des' => 12,
        ];

        // Ambil 3 huruf pertama dari bulan, ubah ke huruf kecil, dan cari di kamus
        $month = $monthMap[strtolower(substr($monthStr, 0, 3))] ?? null;

        if (!$month || !is_numeric($day) || !is_numeric($year)) {
            return null;
        }

        try {
            // Buat tanggal dari angka (hari, bulan, tahun). Ini cara paling aman.
            return Carbon::create((int)$year, $month, (int)$day)->startOfDay();
        } catch (Exception $e) {
            return null;
        }
    }

    private function findValueByKey(array $data, array $keys): string
    {
        foreach ($keys as $key) {
            foreach ($data as $header => $value) {
                if (str_contains($header, $key)) {
                    return $value ?? '';
                }
            }
        }
        return '';
    }
}