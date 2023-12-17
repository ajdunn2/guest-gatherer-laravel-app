<?php

namespace App\Filament\Resources\GuestStatusResource\Pages;

use App\Filament\Resources\GuestStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuestStatuses extends ListRecords
{
    protected static string $resource = GuestStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
