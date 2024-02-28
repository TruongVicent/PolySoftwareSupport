<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Models\Link;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\ColorColumn;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Split;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;
    protected static ?string $navigationIcon = 'heroicon-o-link';


    protected static ?string $label = 'Quản lý link';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Tên liên kết')
                    ->required(),
                TextInput::make('url')
                    ->url()
                    ->required()
                    ->filled()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label('Link liên kết'),
                Select::make('semester_id')
                    ->label('Học kì')
                    ->relationship(name: 'semester', titleAttribute: 'name')
                    ->required()
                    ->filled()
                    ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên liên kết'),
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
            'view' => Pages\ViewLink::route('/{record}'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }
}
