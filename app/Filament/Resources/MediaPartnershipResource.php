<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaPartnershipResource\Pages;
use App\Models\MediaPartnership;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MediaPartnershipResource extends Resource
{
    protected static ?string $model = MediaPartnership::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Media Partnership';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jenis')
                    ->label('Jenis (ex: collaboration,event,etc)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_acara')
                    ->label('Nama Acara')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),
                Forms\Components\TextInput::make('lokasi')
                    ->label('Lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('link')
                    ->label('Link')
                    ->url()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('media_partner')
                    ->label('Media Partner (Peliput)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('artikel')
                    ->label('Artikel')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_acara')
                    ->label('Nama Acara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('media_partner')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMediaPartnerships::route('/'),
            'create' => Pages\CreateMediaPartnership::route('/create'),
            'edit' => Pages\EditMediaPartnership::route('/{record}/edit'),
        ];
    }
}