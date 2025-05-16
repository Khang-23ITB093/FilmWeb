<?php

namespace App\Filament\Resources\SubcriptionResource\Pages;

use App\Filament\Resources\SubcriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubcriptions extends ListRecords
{
    protected static string $resource = SubcriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
