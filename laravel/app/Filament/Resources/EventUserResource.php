<?php

namespace App\Filament\Resources;

use App\Enums\EventRole;
use App\Filament\Resources\EventUserResource\Pages;
use App\Filament\Resources\EventUserResource\RelationManagers;
use App\Models\EventUser;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class EventUserResource extends Resource
{
    protected static ?string $model = EventUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Quản lý sự kiện';

    protected static ?string $label = 'Tham gia sự kiện';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('user_id')
                    ->relationship(name: 'User', titleAttribute: 'name')
                    ->label('Tham gia'),
                Select::make('event_id')
                    ->relationship(name: 'Event', titleAttribute: 'name')
                    ->label('Sự kiện'),
                Select::make('role')
                    ->options(EventRole::class)
                    ->label('Vai trò'),
                Toggle::make('status')
                    ->label('Trạng thái'),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('User.name')
                    ->label('Tham gia'),
                TextColumn::make('Event.name')
                    ->label('Sự kiện'),
                TextColumn::make('role')
                    ->label('Vai trò'),
                ToggleColumn::make('status')
                    ->label('Trạng thái'),
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
            'index' => Pages\ListEventUsers::route('/'),
            'create' => Pages\CreateEventUser::route('/create'),
            'edit' => Pages\EditEventUser::route('/{record}/edit'),
        ];
    }
}
