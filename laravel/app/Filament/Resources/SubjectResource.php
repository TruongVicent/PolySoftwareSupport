<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectResource\Pages;
use App\Filament\Resources\SubjectResource\RelationManagers;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;


class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Môn Học';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Môn')
                    ->maxLength(70),
                TextInput::make('credits')
                    ->required()
                    ->numeric()
                    ->label('Số tín chỉ'),
                TextInput::make('description')
                    ->label('Mô tả')
                    ->required(),
                TextInput::make('link_document')
                    ->required()
                    ->prefix('https://')
                    ->label('Link tài liệu'),
                Toggle::make('status')
                    ->label('Trạng thái'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Môn')
                    ->searchable(),
                TextColumn::make('credits')
                    ->label('Số tín chỉ')
                    ->searchable(),
                TextColumn::make('link_document')
                    ->label('Link tài liệu'),
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
            'index' => Pages\ListSubjects::route('/'),
            // 'create' => Pages\CreateSubject::route('/create'),
            // 'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }
}
