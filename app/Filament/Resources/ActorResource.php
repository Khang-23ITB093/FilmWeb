<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActorResource\Pages;
use App\Models\Actor;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActorResource extends Resource
{
    protected static ?string $model = Actor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    TextInput::make('name')
                        ->label("Name")->columnSpanFull(),
                    TextInput::make('images')
                        ->label("Image URL")
                        ->afterStateHydrated(function ($component, $state) {
                            // Decode JSON from 'images' field
                            $images = json_decode($state, true);
                            // Set the first URL or an empty string
                            $component->state(is_array($images) && count($images) > 0 ? $images[0] : '');
                        })
                        ->dehydrateStateUsing(function ($state) {
                            // Ensure the state is a JSON-encoded array
                            return json_encode([$state], JSON_UNESCAPED_SLASHES);
                        })

                        ->columnSpanFull(),




        ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('images')
                    ->label("Image")
                    ->getStateUsing(function ($record) {
                        // Decode JSON from 'images' field
                        $images = json_decode($record->images, true);
                        // Return the first URL or an empty string
                        return is_array($images) && count($images) > 0 ? $images[0] : '';
                    })
                    ->circular()
                    ->columnSpanFull(),

        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListActors::route('/'),
            'create' => Pages\CreateActor::route('/create'),
            'edit' => Pages\EditActor::route('/{record}/edit'),
        ];
    }
}
