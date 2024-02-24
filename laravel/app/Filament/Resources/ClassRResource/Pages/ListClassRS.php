<?php

namespace App\Filament\Resources\ClassRResource\Pages;

use App\Filament\Resources\ClassRResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClassRS extends ListRecords
{
    protected static string $resource = ClassRResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
