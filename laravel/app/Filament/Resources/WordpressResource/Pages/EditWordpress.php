<?php

namespace App\Filament\Resources\WordpressResource\Pages;

use App\Filament\Resources\WordpressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWordpress extends EditRecord
{
    protected static string $resource = WordpressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
