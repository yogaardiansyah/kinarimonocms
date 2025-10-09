<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetResource\Pages;
use App\Models\Asset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Asset Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Utama')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Aset')
                            ->required()
                            ->maxLength(255),
                        
                        FileUpload::make('photo')
                            ->label('Foto Aset')
                            ->image()
                            ->disk('public'),

                        Select::make('asset_category_id') // Sesuai dengan nama kolom di database
                            ->label('Kategori Aset')
                            ->relationship('assetCategory', 'name') // Sesuai dengan nama method relasi di Model
                            ->required()
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->unique('asset_categories', 'name'),
                            ]),

                        Select::make('user_id')
                            ->label('Penanggung Jawab')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->required(),

                        Select::make('status')
                            ->options([
                                'available' => 'Tersedia',
                                'in_use' => 'Sedang Digunakan',
                                'maintenance' => 'Dalam Perbaikan',
                                'broken' => 'Rusak',
                            ])
                            ->required()
                            ->default('available'),
                        
                        DatePicker::make('purchase_date')
                            ->label('Tanggal Pembelian'),
                        
                        RichEditor::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Spesifikasi Detail')
                    ->description('Isi nama spesifikasi dan nilainya. Contoh: "Resolusi" -> "24MP".')
                    ->schema([
                        KeyValue::make('specifications')
                            ->label('Spesifikasi')
                            ->keyLabel('Nama Properti')
                            ->valueLabel('Nilai Properti')
                            ->addActionLabel('Tambah Spesifikasi'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')->disk('public')->label('Foto')->square(),
                TextColumn::make('name')->label('Nama Aset')->searchable()->sortable(),
                // Menggunakan dot notation dengan nama relasi yang benar
                TextColumn::make('assetCategory.name')->label('Kategori')->searchable()->sortable(),
                TextColumn::make('user.name')->label('Penanggung Jawab')->searchable()->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'in_use' => 'warning',
                        'maintenance' => 'primary',
                        'broken' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')->label('Dibuat Pada')->dateTime('d M Y')->sortable(),
            ])
            ->filters([
                SelectFilter::make('asset_category_id') // Filter berdasarkan ID kategori
                    ->label('Kategori')
                    ->relationship('assetCategory', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('status')
                    ->options([
                        'available' => 'Tersedia',
                        'in_use' => 'Sedang Digunakan',
                        'maintenance' => 'Dalam Perbaikan',
                        'broken' => 'Rusak',
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }    
}