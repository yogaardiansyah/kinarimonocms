<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SopResource\Pages;
use App\Models\Sop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model; // <-- PERBAIKAN 1: Tambahkan ini
use Spatie\Permission\Models\Role;

class SopResource extends Resource
{
    protected static ?string $model = Sop::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Internal';
    protected static ?string $navigationLabel = 'SOP & Peraturan';

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        
        if ($user->hasRole('super_admin')) {
            return parent::getEloquentQuery();
        }

        $userRoleIds = $user->roles->pluck('id');

        return parent::getEloquentQuery()->whereIn('role_id', $userRoleIds);
    }
    
    public static function canCreate(): bool
    {
        return auth()->user()->can('create_sop');
    }

    // PERBAIKAN 2: Ubah type hint dari 'Sop' menjadi 'Model'
    public static function canEdit(Model $record): bool
    {
        return auth()->user()->can('update_sop'); // Standar Shield adalah 'update', bukan 'edit'
    }

    // PERBAIKAN 3: Ubah type hint dari 'Sop' menjadi 'Model'
    public static function canDelete(Model $record): bool
    {
        return auth()->user()->can('delete_sop');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('role_id')
                        ->label('Untuk Divisi / Role')
                        ->options(Role::where('name', '!=', 'super_admin')->pluck('name', 'id'))
                        ->required()
                        ->searchable(),

                    Forms\Components\RichEditor::make('content')
                        ->required()
                        ->columnSpanFull(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('role.name')->label('Divisi')->badge(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime('d M Y')->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSops::route('/'),
            'create' => Pages\CreateSop::route('/create'),
            'edit' => Pages\EditSop::route('/{record}/edit'),
        ];
    }    
}