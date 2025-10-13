<?php

namespace App\Filament\Resources\PosterResource\Pages;

use App\Filament\Resources\PosterResource;
use App\Models\Poster;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// HAPUS "use Livewire\Attributes\Computed;" karena tidak lagi digunakan
use Livewire\Attributes\On;

class GeneratePoster extends Page
{
    protected static string $resource = PosterResource::class;
    protected static string $view = 'filament.resources.poster-resource.pages.generate-poster';

    public ?Poster $record = null;
    public array $initialData = [];

    /**
     * PERBAIKAN: Gunakan properti publik biasa untuk judul di dalam konten.
     * Nilainya akan diatur dalam metode mount() di bawah.
     */
    public string $headerTitle = '';

    public function mount(): void
    {
        if ($this->record) {
            // Atur nilai properti publik di sini
            $this->headerTitle = 'Edit Poster';

            $this->initialData = [
                'text' => $this->record->title,
                'authorText' => $this->record->author,
                'sourceText' => $this->record->source,
                'tabText' => $this->record->category,
                'userImageSrc' => Storage::disk('public')->url($this->record->image_path),
                'transform' => $this->record->transform_data,
            ];
        } else {
            // Dan atur juga di sini untuk kasus 'generate' baru
            $this->headerTitle = 'Generate Poster';
        }
    }

    /**
     * Metode ini tetap dipertahankan untuk kebutuhan internal Filament
     * (misalnya, untuk judul tab browser dan header utama panel).
     */
    public function getTitle(): string
    {
        if ($this->record) {
            return 'Edit Poster';
        }
        return 'Generate Poster';
    }

    /**
     * HAPUS SELURUH computed property #[Computed] public function headerTitle()
     * karena sudah digantikan oleh properti publik $headerTitle.
     */

    #[On('savePoster')]
    public function savePoster(
        string $imageData,
        string $title,
        array $transform,
        ?string $author,
        ?string $source,
        ?string $category
    ): void {
        // Logika savePoster tetap sama, tidak ada perubahan di sini
        if (empty($imageData) || empty($title)) {
            Notification::make()->title('Gagal: Data tidak lengkap.')->danger()->send();
            return;
        }

        try {
            $imageBinary = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            $fileName = 'posters/' . Str::slug($title) . '-' . uniqid() . '.png';
            Storage::disk('public')->put($fileName, $imageBinary);

            $dataToSave = [
                'title'          => $title,
                'image_path'     => $fileName,
                'transform_data' => $transform,
                'author'         => $author,
                'source'         => $source,
                'category'       => $category,
            ];

            if ($this->record) {
                Storage::disk('public')->delete($this->record->image_path);
                $this->record->update($dataToSave);
                $message = 'Poster berhasil diperbarui!';
            } else {
                Poster::create($dataToSave);
                $message = 'Poster berhasil disimpan!';
            }

            Notification::make()->title($message)->success()->send();
            $this->redirect(PosterResource::getUrl('index'));

        } catch (\Exception $e) {
            Notification::make()->title('Terjadi kesalahan')->body($e->getMessage())->danger()->send();
        }
    }
}