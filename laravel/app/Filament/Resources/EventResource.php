<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-2-stack';

    protected static ?string $label = 'Sự kiện';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Sự kiện'),
                FileUpload::make('image')
                    ->image()
                    ->label('Ảnh'),
                RichEditor::make('content')
                    ->label('Nội dung'),
                Select::make('event_type_id')
                    ->relationship(name: 'EventType', titleAttribute: 'name')
                    ->label('Loại sự kiện'),
                DateTimePicker::make('start_time')
                    ->label('Thời gian bắt đàu'),
                DateTimePicker::make('end_time')
                    ->label('Thời gian kết thúc'),
                TextInput::make('target_audience')
                    ->label('Đối tượng'),
                Toggle::make('status')
                    ->label('Trạng thái'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->icon('heroicon-m-sparkles')
                    ->label('Tên sự kiện'),
                ImageColumn::make('image')
                    ->label('Ảnh'),
                TextColumn::make('content')
                    ->label('Nội dung'),
                TextColumn::make('EventType.name')
                    ->label('Loại sự kiện'),
                TextColumn::make('start_time')
                    ->label('Bắt đầu'),
                TextColumn::make('end_time')
                    ->label('Kết thúc'),
                TextColumn::make('target_audience')
                    ->label('Đối tượng'),
                ToggleColumn::make('status')
                    ->label('Trạng thái')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListEvents::route('/'),
            // 'create' => Pages\CreateEvent::route('/create'),
            // 'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
