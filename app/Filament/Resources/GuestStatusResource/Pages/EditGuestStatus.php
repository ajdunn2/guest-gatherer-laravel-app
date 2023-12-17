<?php

namespace App\Filament\Resources\GuestStatusResource\Pages;

use App\Filament\Resources\GuestStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuestStatus extends EditRecord
{
    protected static string $resource = GuestStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
