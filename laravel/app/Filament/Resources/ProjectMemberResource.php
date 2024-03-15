<?php

namespace App\Filament\Resources;

use App\Enums\ProjectRole;
use App\Filament\Resources\ProjectMemberResource\Pages;
use App\Filament\Resources\ProjectMemberResource\RelationManagers;
use App\Models\ProjectMember;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;


class ProjectMemberResource extends Resource
{
    protected static ?string $model = ProjectMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Thành viên dự án';

    protected static ?string $navigationGroup = 'Quản lý dự án';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('project_id')
                    ->relationship(name: 'Project', titleAttribute: 'name')
                    ->label('Tham gia'),
                Select::make('user_id')
                    ->relationship(name: 'User', titleAttribute: 'name')
                    ->label('Thành viên'),
                Select::make('role')
                    ->options(ProjectRole::class)
                    ->label('Vai trò'),
                Toggle::make('status')
                    ->label('Trạng thái'),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Project.name')
                    ->label('Dự án'),
                TextColumn::make('User.name')
                    ->label('Thành viên'),
                TextColumn::make('role')
                    ->label('Vai trò'),
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
            'index' => Pages\ListProjectMembers::route('/'),
            'create' => Pages\CreateProjectMember::route('/create'),
            'edit' => Pages\EditProjectMember::route('/{record}/edit'),
        ];
    }
}
