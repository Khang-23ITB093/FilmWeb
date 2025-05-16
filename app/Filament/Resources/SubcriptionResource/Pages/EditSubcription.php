<?php

namespace App\Filament\Resources\SubcriptionResource\Pages;

use App\Filament\Resources\SubcriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubcription extends EditRecord
{
    protected static string $resource = SubcriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
