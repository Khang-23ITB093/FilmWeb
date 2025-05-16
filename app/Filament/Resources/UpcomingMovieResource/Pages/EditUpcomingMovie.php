<?php

namespace App\Filament\Resources\UpcomingMovieResource\Pages;

use App\Filament\Resources\UpcomingMovieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUpcomingMovie extends EditRecord
{
    protected static string $resource = UpcomingMovieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
