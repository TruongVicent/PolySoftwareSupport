<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use App\Enums\ProjectRole;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;


class ProjectMemberRelationManager extends RelationManager
{
    protected static string $relationship = 'ProjectMember';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('user_id')
                    ->required()
                    ->relationship(name: 'User', titleAttribute: 'name')
                    ->label('Thành viên'),
                Select::make('role')
                    ->required()
                    ->options(ProjectRole::class)
                    ->label('Vai trò'),
                Toggle::make('status')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
            ->columns([
                TextColumn::make('User.name')
                    ->label('Thành viên'),
                TextColumn::make('Project.name')
                    ->label('Dự án'),
                TextColumn::make('role')
                    ->label('Vai trò'),
                ToggleColumn::make('status')
                    ->label('Trạng thái')

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
