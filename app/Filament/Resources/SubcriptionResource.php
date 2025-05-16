<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubcriptionResource\Pages;
use App\Filament\Resources\SubcriptionResource\RelationManagers;
use App\Models\Subcription;
use App\Models\Subscription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Redirect;

class SubcriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Nhóm lựa chọn tên gói
                Forms\Components\Card::make([
                    Forms\Components\Select::make('name')
                        ->label('Package Name') // Thêm nhãn rõ ràng hơn
                        ->options([
                            'free' => 'Free',
                            'basic' => 'Basic',
                            'standard' => 'Standard',
                            'premium' => 'Premium',
                        ])
                        ->required()
                        ->placeholder('Select a package'), // Thêm placeholder
                        Forms\Components\TextInput::make('price')
                            ->label('Price') // Thêm nhãn cho trường giá
                            ->numeric()
                            ->required()
                            ->placeholder('Enter the price') // Thêm placeholder
                            ->columnSpan(1),
                    Forms\Components\Select::make('duration')
                        ->label('Duration') // Thêm nhãn cho trường thời lượng
                        ->options([
                            '1 month' => '1 month',
                            '3 months' => '3 months',
                            '6 months' => '6 months',
                            '12 months' => '12 months',
                        ])
                        ->required()
                        ->placeholder('Select a duration'), // Thêm placeholder

                ])->columns(2), // Tạo khoảng cách bằng cách chia cột

                // Nhóm nhập giá

                Forms\Components\Card::make([
                    Forms\Components\Repeater::make('endow')
                        ->label('Endowments') // Thêm nhãn cho trường lặp
                        ->schema([
                            Forms\Components\TextInput::make('value')
                                ->label('Endow') // Thêm nhãn cho trường giá trị
                                ->required()
                                ->placeholder('Enter endow detail'), // Thêm placeholder
                        ])
                        ->columns(1), // Giữ một cột để đơn giản hóa giao diện
                ]),
            ])
            ->columns(2); // Chia layout chính thành hai cột
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Package Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->searchable()
                    ->money('usd'), // Định dạng tiền tệ
                Tables\Columns\TextColumn::make('name')
                    ->label('Package Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Nếu muốn thêm bộ lọc có thể thêm tại đây
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSubcriptions::route('/'),
            'create' => Pages\CreateSubcription::route('/create'),
            'edit' => Pages\EditSubcription::route('/{record}/edit'),
        ];
    }
}
