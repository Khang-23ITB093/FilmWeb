<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Traits\Date;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Grid::make(2)->schema([

                        TextInput::make('name')
                            ->required()
                            ->label('Name')
                            ->extraAttributes(['class' => 'mr-4']) // Thêm margin-right cho trường name
                            ->columnSpan(1),

                        // Avatar Field
                        FileUpload::make('avatar')
                            ->image()
                            ->directory('users')
                            ->extraAttributes(['class' => 'ml-4']) // Thêm margin-left cho avatar
                            ->avatar()
                            ->label('Avatar')
                            ->columnSpan(1),
                        TextInput::make('phone')
                        ->required()
                        ->columnSpan(1),
                        DatePicker::make('date_of_birth')
                        ->nullable()
                        ->columnSpan(1),
                        Forms\Components\Select::make('sex')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ])
                            ->required()
                            ->columnSpan(1),

                        // Email Field
                        TextInput::make('email')
                            ->required()
                            ->label('Email')
                            ->maxLength(255)
                            ->columnSpan(1),

                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state)),

                        DatePicker::make('subscription_started_at')
                            ->nullable()
                            ->label('Subscription Started At')
                            ->columnSpan(1),

                        DatePicker::make('subscription_ended_at')
                            ->nullable()
                            ->label('Subscription Ended At')
                            ->columnSpan(1),

                        Forms\Components\Select::make('subscription_id')
                            ->label('Subscription')
                            ->options(Subscription::all()->pluck('name', 'id'))
                            ->required()
                            ->columnSpan(1),
                        // Email Verified At Field
                        DatePicker::make('email_verified_at')
                            ->default(now())
                            ->nullable()
                            ->label('Email Verified At')
                            ->columnSpan(1),
                       Forms\Components\Select::make('role')
                            ->options([
                                'user' => 'User',
                                'admin' => 'Admin',
                            ])
                            ->required()
                            ->columnSpan(1),
                    ]),
                ])
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('avatar')
                    ->circular(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('subscription_started_at')
                    ->dateTime()
                    ->sortable()
                    ->hidden(),
                TextColumn::make('password')

                ,

                TextColumn::make('subscription_ended_at')
                    ->dateTime()
                    ->sortable()
                    ->hidden(),

                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
