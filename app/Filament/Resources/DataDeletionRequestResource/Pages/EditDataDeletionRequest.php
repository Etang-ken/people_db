<?php

namespace App\Filament\Resources\DataDeletionRequestResource\Pages;

use App\Filament\Resources\DataDeletionRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataDeletionRequest extends EditRecord
{
    protected static string $resource = DataDeletionRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
