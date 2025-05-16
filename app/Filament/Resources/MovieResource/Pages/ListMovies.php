<?php

namespace App\Filament\Resources\MovieResource\Pages;

use App\Filament\Resources\MovieResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListMovies extends ListRecords
{
    protected static string $resource = MovieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs() :array
    {
        return [
            null => Tab::make('ALL'),
        'show' =>Tab::make('Show')->query(fn($query) => $query->where('type', 'show')),
          'movie' => Tab::make('Movies')->query(fn($query) => $query->where('type', 'movie')),
        ];
    }
}
