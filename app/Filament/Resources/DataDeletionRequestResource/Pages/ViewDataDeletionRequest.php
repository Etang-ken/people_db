<?php

namespace App\Filament\Resources\DataDeletionRequestResource\Pages;

use App\Filament\Resources\DataDeletionRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDataDeletionRequest extends ViewRecord
{
    protected static string $resource = DataDeletionRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
