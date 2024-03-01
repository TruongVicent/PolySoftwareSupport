<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassSubjectResource\Pages;
use App\Models\ClassSubject;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Toggle;
use App\Models\Semester;

class ClassSubjectResource extends Resource
{
    protected static ?string $model = ClassSubject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Lớp môn';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->required()
                    ->relationship(name: 'User', titleAttribute: 'name')
                    ->label('Tên giáo viên'),
                Select::make('class_r_id')
                    ->required()
                    ->relationship(name: 'ClassR', titleAttribute: 'name')
                    ->label('Lớp'),
                Select::make('subject_id')
                    ->required()
                    ->relationship(name: 'Subject', titleAttribute: 'name')
                    ->label('Môn'),
                Select::make('semester_id')
                    ->required()
                    ->default(function () {
                        $currentSemester = Semester::where('is_current', true)->first();
                        return $currentSemester ? $currentSemester->id : null;
                    })
                    ->relationship(name: 'Semester', titleAttribute: 'name')
                    ->label('Học kì'),
                Toggle::make('status')
                    ->label('Trạng thái'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('User.name')
                    ->icon('heroicon-m-user-circle')
                    ->label('Giáo viên'),
                TextColumn::make('ClassR.name')
                    ->label('Lớp'),
                TextColumn::make('Subject.name')
                    ->label('Môn'),
                TextColumn::make('Semester.name')
                    ->label('Lớp'),
                ToggleColumn::make('status')
                    ->label('Trạng thái'),
            ])
            ->filters([
                SelectFilter::make('user_id')->label('Giáo viên')
                    ->relationship('user', 'name'),
                SelectFilter::make('class_r_id')->label('Lớp')
                    ->relationship('classr', 'name'),
                SelectFilter::make('subject_id')->label('Môn')
                    ->relationship('subject', 'name'),
                SelectFilter::make('semester_id')->label('Môn')
                    ->relationship('semester', 'name'),
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
            'index' => Pages\ListClassSubjects::route('/'),
            // 'create' => Pages\CreateClassSubject::route('/create'),
            // 'edit' => Pages\EditClassSubject::route('/{record}/edit'),
        ];
    }
}
