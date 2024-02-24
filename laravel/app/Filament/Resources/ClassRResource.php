<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassRResource\Pages;
use App\Filament\Resources\ClassRResource\RelationManagers;
use App\Models\ClassR;
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


class ClassRResource extends Resource
{
    protected static ?string $model = ClassR::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    protected static ?string $label = 'Lớp Học';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Tên lớp'),
                Toggle::make('status')
                    ->label('Trạng thái'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Lớp'),
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
            'index' => Pages\ListClassRS::route('/'),
            // 'create' => Pages\CreateClassR::route('/create'),
            // 'edit' => Pages\EditClassR::route('/{record}/edit'),
        ];
    }
}
