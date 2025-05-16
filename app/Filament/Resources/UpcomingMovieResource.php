<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UpcomingMovieResource\Pages;
use App\Models\UpcomingMovie;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UpcomingMovieResource extends Resource
{
    protected static ?string $model = UpcomingMovie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Upcoming Movie Information')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('title_upcoming')
                                            ->label('Title')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpan(1),
                                        TextInput::make('release_month_upcoming')
                                            ->label('Release Month')
                                            ->required()
                                            ->numeric()
                                            ->columnSpan(1),
                                        TextInput::make('release_day_upcoming')
                                            ->label('Release Day')
                                            ->required()
                                            ->numeric()
                                            ->columnSpan(1),
                                        TextInput::make('release_year_upcoming')
                                            ->label('Release Year')
                                            ->required()
                                            ->numeric()
                                            ->columnSpan(1),
                                        TextInput::make('links')
                                            ->label('Links')
                                            ->required()
                                            ->columnSpan(2),
                                    ]),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_upcoming')->searchable(),
                TextColumn::make('release_month_upcoming')->sortable(),
                TextColumn::make('release_day_upcoming')->sortable(),
                TextColumn::make('release_year_upcoming')->sortable(),
                TextColumn::make('links')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUpcomingMovies::route('/'),
            'create' => Pages\CreateUpcomingMovie::route('/create'),
            'edit' => Pages\EditUpcomingMovie::route('/{record}/edit'),
        ];
    }
}
