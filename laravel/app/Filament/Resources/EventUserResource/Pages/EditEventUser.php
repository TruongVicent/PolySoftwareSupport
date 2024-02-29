<?php

namespace App\Filament\Resources\EventUserResource\Pages;

use App\Filament\Resources\EventUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventUser extends EditRecord
{
    protected static string $resource = EventUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
