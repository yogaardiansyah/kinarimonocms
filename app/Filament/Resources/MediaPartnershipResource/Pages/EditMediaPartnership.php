<?php

namespace App\Filament\Resources\MediaPartnershipResource\Pages;

use App\Filament\Resources\MediaPartnershipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaPartnership extends EditRecord
{
    protected static string $resource = MediaPartnershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
