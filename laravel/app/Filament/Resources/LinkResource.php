<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Models\Link;
use App\Models\Semester;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;


class LinkResource extends Resource
{
    protected static ?string $model = Link::class;
    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationGroup = 'Quản lý Lớp / Môn / Học kỳ';

    protected static ?string $label = 'Quản lý link';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Tên liên kết')
                    ->required(),
                TextInput::make('url')
                    ->required()
                    ->url()
                    ->filled()
                    ->prefix('https://')
                    ->label('Link liên kết'),
                Select::make('semester_id')
                    ->label('Học kì')
                    ->relationship(name: 'semester', titleAttribute: 'name')
                    ->required()
                    ->default(function () {
                        $currentSemester = Semester::where('is_current', true)->first();
                        return $currentSemester ? $currentSemester->id : null;
                    })
                    ->filled()
                    ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên liên kết')
                    ->searchable(),
                TextColumn::make('url')
                    ->label('Link liên kết'),
                TextColumn::make('semester.name')
                    ->label('Học kì'),
            ])
            ->filters([
                SelectFilter::make('semester_id')->label('Học kì')
                    ->relationship('semester', 'name'),
            ])
            ->actions([
                Tables\Actions\Action::make('visit')
                    ->label('Tới đường link')
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->color('gray')
                    ->url(fn(Link $record): string => '#' . urlencode($record->url)),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function () {
                            Notification::make()
                                ->title('Now, now, don\'t be cheeky, leave some records for others to play with!')
                                ->warning()
                                ->send();
                        }),
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
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
//            'view' => Pages\ViewLink::route('/{record}'),
//            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }
}
