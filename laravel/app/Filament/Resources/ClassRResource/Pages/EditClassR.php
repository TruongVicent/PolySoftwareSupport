<?php

namespace App\Filament\Resources\ClassRResource\Pages;

use App\Filament\Resources\ClassRResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClassR extends EditRecord
{
    protected static string $resource = ClassRResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
