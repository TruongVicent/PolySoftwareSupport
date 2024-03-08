<?php

namespace App\Filament\Resources\ProjectImgResource\Pages;

use App\Filament\Resources\ProjectImgResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectImg extends EditRecord
{
    protected static string $resource = ProjectImgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
