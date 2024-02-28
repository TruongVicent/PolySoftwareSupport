<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;


class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Dự án';
    protected static ?string $navigationGroup = 'Quản lý dự án';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Tên dự án'),
                Select::make('project_type_id')
                    ->relationship(name: 'ProjectType', titleAttribute: 'name')
                    ->label('Quản lý sự kiện'),
                FileUpload::make('banner')->columnSpan('full')
                    ->image()
                    ->label('Ảnh'),
                RichEditor::make('description')->columnSpan('full')
                    ->label('Nội dung'),
                DateTimePicker::make('start_date')
                    ->label('Thời gian bắt đàu'),
                DateTimePicker::make('end_date')
                    ->label('Thời gian kết thúc'),
                Toggle::make('status')
                    ->label('Trạng thái'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên dự án'),
                ImageColumn::make('banner')
                    ->label('Ảnh'),
                TextColumn::make('ProjectType.name')
                    ->label('Loại dự án'),
                TextColumn::make('start_date')
                    ->label('Ngày bắt đầu'),
                TextColumn::make('end_date')
                    ->label('ngày kết thúc'),
                ToggleColumn::make('status')
                    ->label('Trạng thái'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
