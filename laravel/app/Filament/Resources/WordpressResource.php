<?php

namespace App\Filament\Resources;

use App\Enums\WordpressRole;
use App\Filament\Resources\WordpressResource\Pages;
use App\Models\Wordpress;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;


class WordpressResource extends Resource
{
    protected static ?string $model = Wordpress::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Quản lý file WordPress';
    protected static ?string $navigationGroup = 'Quản lý file WordPress';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Tên file')
                    ->required(),
                TextInput::make('version')
                    ->label('Phiên bản')
                    ->required(),
                Select::make('type')
                    ->options(WordpressRole::class)
                    ->label('Loại')
                    ->required(),
                FileUpload::make('thumbnail')->columnSpan('full')
                    ->label('Hình ảnh')
                    ->required(),
                FileUpload::make('file')->columnSpan('full')
                    ->label('File')
                    ->required()
                    ->acceptedFileTypes(['application/zip']),
                Toggle::make('status')
                    ->label('Trạng thái')
                    ->required(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Tên file'),
                ImageColumn::make('thumbnail')
                    ->label('Hình ảnh'),
                TextColumn::make('version')
                    ->label('Phiên bản'),
                TextColumn::make('type')
                    ->label('Loại'),
                ToggleColumn::make('status')
                    ->label('Trạng thái'),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Loại')
                    ->options(WordpressRole::class)
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name')
                    ->label('Tên'),
                TextEntry::make('file')
                    ->label('file'),
                TextEntry::make('version')
                    ->label('phiên bản'),
                TextEntry::make('type')
                    ->label('loại')
            ])
            ->columns(1)
            ->inlineLabel();
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
            'index' => Pages\ListWordpresses::route('/'),
            'create' => Pages\CreateWordpress::route('/create'),
            'edit' => Pages\EditWordpress::route('/{record}/edit'),
        ];
    }
}
