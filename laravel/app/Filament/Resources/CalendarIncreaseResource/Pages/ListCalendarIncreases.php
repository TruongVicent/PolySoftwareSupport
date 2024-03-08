<?php

namespace App\Filament\Resources\CalendarIncreaseResource\Pages;

use App\Filament\Resources\CalendarIncreaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalendarIncreases extends ListRecords
{
    protected static string $resource = CalendarIncreaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
