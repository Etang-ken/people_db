<?php

namespace App\Filament\Resources\DataDeletionRequestResource\Pages;

use App\Filament\Resources\DataDeletionRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataDeletionRequests extends ListRecords
{
    protected static string $resource = DataDeletionRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
