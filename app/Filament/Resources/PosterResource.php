<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PosterResource\Pages;
use App\Models\Poster;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class PosterResource extends Resource
{
    protected static ?string $model = Poster::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    /**
     * Method form() tidak lagi digunakan karena Create dan Edit sekarang menggunakan Generator.
     * Dikosongkan untuk kebersihan kode.
     */
    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')->label('Poster')->disk('public')->height(150),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('author')->searchable(),
                TextColumn::make('category')->badge(),
                TextColumn::make('created_at')->dateTime('d M Y')->sortable(),
            ])
            ->headerActions([
                Action::make('generate')
                    ->label('Buat Poster Baru')
                    ->icon('heroicon-o-sparkles')
                    ->url(fn (): string => self::getUrl('generate'))
            ])
            ->actions([
                // Mengganti EditAction standar dengan Action kustom yang mengarah ke generator
                Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-o-pencil-square')
                    ->url(fn (Poster $record): string => self::getUrl('generate', ['record' => $record])),

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosters::route('/'),
            // Halaman 'edit' standar dihapus, dan 'generate' sekarang menerima parameter opsional
            'generate' => Pages\GeneratePoster::route('/generate/{record?}'),
        ];
    }
}