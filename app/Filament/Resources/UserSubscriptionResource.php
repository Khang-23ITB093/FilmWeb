<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserSubscriptionResource\Pages;
use App\Models\UserSubscriptions;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserSubscriptionResource extends Resource
{
    protected static ?string $model = UserSubscriptions::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('User Subscription Information')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Select::make('user_id')
                                            ->label('User')
                                            ->relationship('user', 'name')
                                            ->required()
                                            ->columnSpan(1),
                                        Select::make('subscription_id')
                                            ->label('Subscription')
                                            ->relationship('subscription', 'name')
                                            ->required()
                                            ->columnSpan(1),
                                        DatePicker::make('subscribed_at')
                                            ->label('Subscribed At')
                                            ->required()
                                            ->columnSpan(1),
                                        DatePicker::make('expiry_date')
                                            ->label('Expiry Date')
                                            ->required()
                                            ->columnSpan(1),
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
                TextColumn::make('user.name')->label('User')->searchable(),
                TextColumn::make('subscription.name')->label('Subscription')->searchable(),
                TextColumn::make('subscribed_at')->label('Subscribed At')->sortable(),
                TextColumn::make('expiry_date')->label('Expiry Date')->sortable(),
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
            'index' => Pages\ListUserSubscriptions::route('/'),
            'create' => Pages\CreateUserSubscription::route('/create'),
            'edit' => Pages\EditUserSubscription::route('/{record}/edit'),
        ];
    }
}
