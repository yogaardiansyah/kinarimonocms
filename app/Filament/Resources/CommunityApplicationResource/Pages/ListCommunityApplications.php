<?php

namespace App\Filament\Resources\CommunityApplicationResource\Pages;

use App\Filament\Resources\CommunityApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommunityApplications extends ListRecords
{
    protected static string $resource = CommunityApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
