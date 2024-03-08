<?php

namespace App\Filament\Resources\CalendarIncreaseResource\Pages;

use App\Filament\Resources\CalendarIncreaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalendarIncrease extends EditRecord
{
    protected static string $resource = CalendarIncreaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
