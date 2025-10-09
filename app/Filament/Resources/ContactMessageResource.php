<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Community';
    protected static ?string $navigationLabel = 'Contact Message';

    public static function canCreate(): bool
    {
        return false; // Pesan hanya bisa dibuat dari form publik
    }

    public static function form(Form $form): Form
    {
        // Form ini digunakan untuk 'ViewAction'
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->disabled(),
                Forms\Components\TextInput::make('email')->disabled(),
                Forms\Components\TextInput::make('subject')->disabled(),
                Forms\Components\Textarea::make('message')->columnSpanFull()->disabled(),
                Forms\Components\Select::make('status')->options([
                    'new' => 'New',
                    'read' => 'Read',
                    'replied' => 'Replied',
                ])->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('subject')->searchable()->limit(30),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'primary',
                        'read' => 'warning',
                        'replied' => 'success',
                    }),
                Tables\Columns\TextColumn::make('created_at')->label('Diterima')->dateTime('d M Y H:i')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Action::make('toggleStatus')
                    ->label(fn (ContactMessage $record): string => $record->status === 'new' ? 'Mark as Read' : 'Mark as Replied')
                    ->icon('heroicon-o-check-circle')
                    ->action(function (ContactMessage $record) {
                        if ($record->status === 'new') {
                            $record->update(['status' => 'read']);
                        } elseif ($record->status === 'read') {
                            $record->update(['status' => 'replied']);
                        }
                    })
                    ->visible(fn (ContactMessage $record): bool => $record->status !== 'replied'),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
        ];
    }
}