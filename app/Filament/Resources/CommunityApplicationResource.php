<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunityApplicationResource\Pages;
use App\Models\CommunityApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action; // Import Action

class CommunityApplicationResource extends Resource
{
    protected static ?string $model = CommunityApplication::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = 'Community';
    protected static ?string $navigationLabel = 'Applicants';

    /**
     * Menghilangkan tombol "New Application" di halaman utama.
     */
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        // Form ini tidak akan digunakan untuk membuat atau mengedit,
        // jadi kita bisa membuatnya simpel.
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->disabled(),
                Forms\Components\TextInput::make('instagram')->disabled(),
                Forms\Components\Textarea::make('reason')->disabled()->columnSpanFull(),
                Forms\Components\Select::make('status')->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('instagram')->searchable(),
                Tables\Columns\TextColumn::make('reason')->limit(50),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                // AKSI KUSTOM UNTUK MENYETUJUI
                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(fn (CommunityApplication $record) => $record->update(['status' => 'approved']))
                    ->requiresConfirmation()
                    // Hanya tampil jika status bukan 'approved'
                    ->visible(fn (CommunityApplication $record): bool => $record->status !== 'approved'),

                // AKSI KUSTOM UNTUK MENOLAK
                Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->action(fn (CommunityApplication $record) => $record->update(['status' => 'rejected']))
                    ->requiresConfirmation()
                    // Hanya tampil jika status bukan 'rejected'
                    ->visible(fn (CommunityApplication $record): bool => $record->status !== 'rejected'),
                
                // AKSI DELETE BAWAAN
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
        // Kita hanya butuh halaman daftar, tidak ada create, edit, atau view
        return [
            'index' => Pages\ListCommunityApplications::route('/'),
        ];
    }    
}