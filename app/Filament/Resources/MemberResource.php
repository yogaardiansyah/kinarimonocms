<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('photo')
                    ->label('Foto Anggota')
                    ->image()->avatar()->directory('member-photos')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('id_member')
                    ->label('ID Member')
                    ->disabled() // Tidak bisa diubah oleh user
                    ->dehydrated() // Pastikan tetap tersimpan meskipun disabled
                    ->hiddenOn('create') // Sembunyikan saat membuat baru
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required(),

                Forms\Components\Select::make('role_id')
                    ->label('Divisi')
                    ->relationship(name: 'divisionRole', titleAttribute: 'name') // Mengambil dari relasi
                    ->searchable()
                    ->preload() // Memuat opsi saat halaman dibuka
                    ->required(),

                Forms\Components\DatePicker::make('joined_at')
                    ->label('Tanggal Bergabung')
                    ->required()
                    ->native(false),

                Forms\Components\Textarea::make('address')
                    ->label('Alamat')
                    ->rows(3)
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('social_media')
                    ->label('Media Sosial')
                    ->schema([
                        Forms\Components\TextInput::make('platform')->label('Platform')->required(),
                        Forms\Components\TextInput::make('url')->label('URL Profil')->url()->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->defaultItems(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('id_member')
                    ->label('ID Member')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('divisionRole.name') // Mengambil nama dari relasi
                    ->label('Divisi')
                    ->badge() // Tampilkan sebagai badge
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('joined_at')
                    ->label('Bergabung Sejak')
                    ->date('d F Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}