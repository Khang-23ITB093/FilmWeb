<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Filament\Resources\MovieResource\RelationManagers;
use App\Models\Film;
use App\Models\FilmImages;
use App\Models\View;
use Faker\Provider\ar_EG\Text;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Hamcrest\Core\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([

                        Section::make('Movie Information')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Title')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpan(1)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state) . '-' . Str::random(6)) : null),
                                        TextInput::make('slug')
                                            ->disabled()
                                            ->maxLength(255)
                                            ->required()
                                            ->dehydrated()
                                            ->unique(Film::class, 'slug', ignoreRecord: true),

                                    DatePicker::make('release_date')
                                        ->label('Release Year')
                                        ->required()
                                        ->columnSpan(1),

                                    Select::make('genre_id')
                                        ->label('Genre')
                                        ->multiple()
                                        ->required()
                                        ->preload()
                                        ->relationship('genres', 'name')
                                        ->columnSpan(2),

                                    TextInput::make('duration')
                                        ->label('Duration (in minutes)')
                                        ->required()
                                        ->numeric()
                                        ->minValue(1)
                                        ->maxValue(600)
                                        ->columnSpan(1),

                                    TextInput::make('average_rating')
                                        ->label('Rating')
                                        ->required()
                                        ->columnSpan(1),

                                    Select::make('actor_id')
                                        ->label('Actors')
                                        ->multiple()
                                        ->required()
                                        ->preload()
                                        ->relationship('actors', 'name')
                                        ->columnSpan(1),
                                    Select::make('type')
                                        ->options([
                                            'show' => 'Show',
                                            'movie' => 'Movie',
                                        ])
                                        ->required()
                                        ->columnSpan(1),
                                    Forms\Components\Toggle::make('status')
                                        ->label('Status')
                                        ->default(true)
                                        ->columnSpan(1),
                                    MarkdownEditor::make('description')
                                        ->label('Description')
                                        ->required()
                                        ->columnSpanFull(),
                                ]),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),


                Group::make()
                    ->schema([
                        Section::make('Additional Details')
                            ->schema([
                                Grid::make(2)
                                ->schema([
                                    TextInput::make('video_path')
                                        ->label('Video Link')
                                        ->required()
                                        ->afterStateHydrated(function ($component, $state) {
                                            // Decode JSON from 'video_path' field
                                            $videoPath = json_decode($state, true);
                                            // Set the first URL or an empty string
                                            $component->state(is_array($videoPath) && count($videoPath) > 0 ? $videoPath[0] : '');
                                        })
                                        ->dehydrateStateUsing(function ($state) {
                                            // Ensure the state is a JSON-encoded array with escaped slashes
                                            return json_encode([$state]);
                                        })
                                        ->columnSpan(2),
                                    Forms\Components\Section::make('film_images')
                                        ->relationship('filmImages')  // Liên kết với FilmImage
                                        ->schema([

                                            TextInput::make('backgrounds')
                                                ->label('Backgrounds')
                                                ->afterStateHydrated(function ($component, $state) {
                                                    // Decode JSON from 'images' field
                                                    $backgrounds = json_decode($state, true);
                                                    // Set the first URL or an empty string
                                                    $component->state(is_array($backgrounds) && count($backgrounds) > 0 ? $backgrounds[0] : '');
                                                })
                                                ->dehydrateStateUsing(function ($state) {
                                                    // Ensure the state is a JSON-encoded array
                                                    return json_encode([$state], JSON_UNESCAPED_SLASHES);
                                                })

                                                ->columnSpanFull(),
                                            Forms\Components\View::make('components.backgrounds-preview')
                                                ->label('Preview'),

                                            TextInput::make('posters')
                                                ->label('Posters')
                                                ->required()
                                                ->afterStateHydrated(function ($component, $state) {
                                                    // Decode JSON from 'images' field
                                                    $backgrounds = json_decode($state, true);
                                                    // Set the first URL or an empty string
                                                    $component->state(is_array($backgrounds) && count($backgrounds) > 0 ? $backgrounds[0] : '');
                                                })
                                                ->dehydrateStateUsing(function ($state) {
                                                    // Ensure the state is a JSON-encoded array
                                                    return json_encode([$state], JSON_UNESCAPED_SLASHES);
                                                })
                                            ,
                                            Forms\Components\View::make('components.poster-preview')
                                                ->label('Preview'),

                                        ])
                                        ->collapsible()  // Cho phép gập lại mỗi mục
                                    ->columnSpan(2),
                                ]),


                            ])
                            ->columnSpanFull(),
                    ]),

            ]);
    }

//    public static function mutateFormDataBeforeFill(array $data): array
//    {
//        if (isset($data['filmImages']['backgrounds'])) {
//            $backgrounds = json_decode($data['filmImages']['backgrounds'], true);
//            $data['backgrounds'] = is_array($backgrounds) && !empty($backgrounds) ? $backgrounds[0] : '';
//        }
//
//        if (isset($data['filmImages']['posters'])) {
//            $posters = json_decode($data['filmImages']['posters'], true);
//            $data['posters'] = is_array($posters) && !empty($posters) ? $posters[0] : '';
//        }
//
//        return $data;
//    }




//    public static function mutateFormDataBeforeSave(array $data): array
//    {
//        $data['backgrounds'] = is_array($data['backgrounds'])
//            ? json_encode($data['backgrounds'], JSON_UNESCAPED_SLASHES)
//            : json_decode($data['backgrounds'], true);
//
//        $data['posters'] = is_array($data['posters'])
//            ? json_encode($data['posters'], JSON_UNESCAPED_SLASHES)
//            : json_decode($data['posters'], true);
//
//        return $data;
//    }
//
//    public static function mutateFormDataBeforeCreate(array $data): array
//    {
//        $data['backgrounds'] = is_array($data['backgrounds'])
//            ? json_encode($data['backgrounds'], JSON_UNESCAPED_SLASHES)
//            : json_decode($data['backgrounds'], true);
//
//        $data['posters'] = is_array($data['posters'])
//            ? json_encode($data['posters'], JSON_UNESCAPED_SLASHES)
//            : json_decode($data['posters'], true);
//
//        return $data;
//    }
//
//    private static function ensureJsonEncoded($data)
//    {
//        // Kiểm tra nếu dữ liệu đã là chuỗi JSON hợp lệ
//        if (is_string($data) && json_decode($data) !== null) {
//            return $data; // Trả về dữ liệu nếu đã là JSON
//        }
//
//        // Nếu dữ liệu là mảng hoặc chuỗi chưa JSON, thì mã hóa lại
//        return json_encode((array) $data, JSON_UNESCAPED_SLASHES);
//    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('release_date'),
                TextColumn::make('duration')->sortable(),
                TextColumn::make('rating'),
                TextColumn::make('video_path')
                    ->formatStateUsing(function ($record) {
                        $links = json_decode($record->links, true);

                        if (is_array($links)) {
                            return implode(', ', array_column($links, 'url'));
                        }

                        return ''; // Trả về chuỗi rỗng nếu không có liên kết
                    })
                ->hidden(fn () => true),

                ImageColumn::make('backgrounds')
                    ->label('Background Images')
                    ->getStateUsing(function ($record) {
                        // Giải mã JSON và lấy phần tử đầu tiên
                        $backgrounds = json_decode($record->filmImages->backgrounds, true);

                        if (is_array($backgrounds) && !empty($backgrounds)) {
                            return $backgrounds[0]; // Trả về phần tử đầu tiên
                        }

                        return null; // Trả về null nếu không có dữ liệu
                    })
                    ->size(50)
                    ->circular(),

                ImageColumn::make('posters')
                    ->label('Poster Images')
                    ->getStateUsing(function ($record) {
                        $posters = json_decode($record->filmImages->posters, true);

                        if (is_array($posters) && !empty($posters)) {
                            return $posters[0]; // Trả về phần tử đầu tiên
                        }

                        return null; // Trả về null nếu không có dữ liệu
                    })
                    ->size(50)
                    ->circular(),


                TextColumn::make('genres.name')
                    ->label('Genres')
                    ->formatStateUsing(function ($record) {
                        return $record->genres->pluck('name')->join(', ');
                    })
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->hidden(fn () => true),
                ImageColumn::make('actors.images')
                    ->label('Actors')
                    ->circular()
                    ->stacked()
                    ->limit(1)
                    ->hidden(fn () => true),
                Tables\Columns\IconColumn::make('status')
                ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),            ])
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
            'index' => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
            'edit' => Pages\EditMovie::route('/{record}/edit'),
        ];
    }
}
