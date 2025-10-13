<?php

namespace App\Filament\Resources\MediaPartnershipResource\Pages;

use App\Filament\Resources\MediaPartnershipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediaPartnerships extends ListRecords
{
    protected static string $resource = MediaPartnershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
