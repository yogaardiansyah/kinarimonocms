<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinancialTransactionResource\Pages;
use App\Models\FinancialCategory;
use App\Models\FinancialTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get; // Import Get untuk form dinamis
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Sum; // Import Summarizer

class FinancialTransactionResource extends Resource
{
    protected static ?string $model = FinancialTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Financial Management';
    protected static ?string $navigationLabel = 'Transactions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Transaksi')->schema([
                    Forms\Components\Select::make('type')
                        ->label('Tipe Transaksi')
                        ->options([
                            'income' => 'Pemasukan',
                            'expense' => 'Pengeluaran',
                        ])
                        ->required()
                        ->live() // PENTING: Membuat form reaktif
                        ->afterStateUpdated(fn (Forms\Set $set) => $set('financial_category_id', null)), // Reset kategori jika tipe diubah

                    Forms\Components\Select::make('financial_category_id')
                        ->label('Kategori Transaksi')
                        // Opsi kategori akan difilter berdasarkan 'Tipe Transaksi' yang dipilih
                        ->options(function (Get $get) {
                            $type = $get('type');
                            if (!$type) {
                                return [];
                            }
                            return FinancialCategory::where('type', $type)->pluck('name', 'id');
                        })
                        ->required()
                        ->searchable(),
                    
                    Forms\Components\TextInput::make('amount')
                        ->label('Jumlah')
                        ->required()
                        ->numeric()
                        ->prefix('Rp'),

                    Forms\Components\DatePicker::make('transaction_date')
                        ->label('Tanggal Transaksi')
                        ->required()
                        ->default(now()),

                    Forms\Components\RichEditor::make('description')
                        ->label('Deskripsi')
                        ->required()
                        ->columnSpanFull(),
                    
                    Forms\Components\FileUpload::make('receipt_path')
                        ->label('Bukti / Nota')
                        ->disk('public'),

                    Forms\Components\Hidden::make('user_id')
                        ->default(auth()->id()),

                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transaction_date')->label('Tanggal')->date('d M Y')->sortable(),
                TextColumn::make('description')->label('Deskripsi')->searchable()->limit(40),
                TextColumn::make('financialCategory.name')->label('Kategori')->searchable(),
                TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'income' => 'success',
                        'expense' => 'danger',
                    }),
                TextColumn::make('amount')
                    ->money('IDR')
                    ->sortable()
                    // INI KUNCINYA: Menampilkan total di bawah tabel
                    ->summarize([
                        Sum::make()
                            ->label('Total Pemasukan')
                            ->money('IDR')
                            ->query(fn (Builder $query) => $query->where('type', 'income')),
                        Sum::make()
                            ->label('Total Pengeluaran')
                            ->money('IDR')
                            ->query(fn (Builder $query) => $query->where('type', 'expense')),
                    ]),
                TextColumn::make('user.name')->label('Dicatat oleh'),
            ])
            ->defaultSort('transaction_date', 'desc')
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinancialTransactions::route('/'),
            'create' => Pages\CreateFinancialTransaction::route('/create'),
            'edit' => Pages\EditFinancialTransaction::route('/{record}/edit'),
        ];
    }    
}