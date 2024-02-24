<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SemesterResource\Pages;
use App\Filament\Resources\SemesterResource\RelationManagers;
use App\Models\Semester;
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
use Filament\Forms\Components\Radio;


class SemesterResource extends Resource
{
    protected static ?string $model = Semester::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    protected static ?string $label = 'Học kì/ Năm học/ Block';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique()
                    ->validationMessages([
                        'unique' => 'Học kì này đã được tạo.',
                    ])
                    ->label('Tên học kì'),
                Radio::make('is_current')
                    ->options([
                        '1' => 'Có',
                        '0' => 'Không',
                    ])
                    ->descriptions([
                        '1' => 'Đang hoạt động.',
                        '0' => 'Tạm dừng hoạt động.',
                    ])
                    ->label('Hoạt động hiện tại'),
                Toggle::make('status')
                    ->label('Trạng thái'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->icon('heroicon-m-user-circle')
                    ->label('Học kì'),
                ToggleColumn::make('is_current')
                    ->label('Hiện tại'),
                ToggleColumn::make('status')
                    ->label('Trạng thái'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListSemesters::route('/'),
            // 'create' => Pages\CreateSemester::route('/create'),
            // 'edit' => Pages\EditSemester::route('/{record}/edit'),
        ];
    }
}
