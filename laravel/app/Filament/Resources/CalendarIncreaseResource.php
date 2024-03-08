<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalendarIncreaseResource\Pages;
use App\Models\CalendarIncrease;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;
use Illuminate\Support\Carbon;


class CalendarIncreaseResource extends Resource
{
    protected static ?string $model = CalendarIncrease::class;
    protected static ?string $label = 'Quản lí lịch tăng cường';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('class_subject_id')
                    ->required()
                    ->relationship(name: 'ClassSubject.ClassR', titleAttribute: 'name')
                    ->label('Lớp học'),
                Select::make('room_id')
                    ->required()
                    ->relationship(name: 'Room', titleAttribute: 'name')
                    ->rules([
                        fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                            $check = CalendarIncrease::where('study_id', $get('study_id'))
                                ->where('room_id', $get('room_id'))
                                ->whereDate('date', $get('date'))
                                ->first();
                            if ($check != NULL) {
                                $fail("Ca này đã trùng lịch với phòng khác ca khác");
                            }
                        }])
                    ->label('Phòng học'),
                Select::make('study_id')
                    ->required()
                    ->relationship(name: 'Study', titleAttribute: 'name')
                    ->rules([
                        fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                            $check = CalendarIncrease::where('study_id', $get('study_id'))
                                ->where('room_id', $get('room_id'))
                                ->whereDate('date', $get('date'))
                                ->first();
                            if ($check != NULL) {
                                $fail("Ca này đã trùng lịch với phòng khác ca khác");
                            }
                        }])
                    ->label('Ca học'),
                DatePicker::make('date')
                    ->label('Ngày học')
                    ->rules([
                        fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                            $check = CalendarIncrease::where('study_id', $get('study_id'))
                                ->where('room_id', $get('room_id'))
                                ->whereDate('date', $get('date'))
                                ->first();
                            if ($check != NULL) {
                                $fail("Ca này đã trùng lịch với phòng khác ca khác");
                            }
                        }])
                    ->required(),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('ClassSubject.Subject.name')
                    ->label('Môn học'),
                TextEntry::make('ClassSubject.User.name')
                    ->icon('heroicon-m-user-circle')
                    ->label('Giáo viên'),
                TextEntry::make('Room.name')
                    ->label('Phòng học'),
                TextEntry::make('Study.name')
                    ->label('Ca học'),
                TextEntry::make('date')
                    ->label('Ngày học'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ClassSubject.Subject.name')
                    ->label('Môn học')
                    ->searchable(),
                TextColumn::make('ClassSubject.User.name')
                    ->icon('heroicon-m-user-circle')
                    ->label('Giáo viên')
                    ->searchable(),
                TextColumn::make('Room.name')
                    ->label('Phòng học')
                    ->searchable(),
                TextColumn::make('Study.name')
                    ->label('Ca học')
                    ->searchable(),
                TextColumn::make('date')
                    ->label('Ngày học'),
            ])
            ->filters([
                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')->label('Từ ngày')
                            ->placeholder(fn($state): string => 'Dec 18, ' . now()->subYear()->format('Y')),
                        Forms\Components\DatePicker::make('published_until')->label('Đến ngày')
                            ->placeholder(fn($state): string => now()->format('M d, Y')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'] ?? null,
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                            )
                            ->when(
                                $data['published_until'] ?? null,
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['published_from'] ?? null) {
                            $indicators['published_from'] = 'Từ ngày ' . Carbon::parse($data['published_from'])->toFormattedDateString();
                        }
                        if ($data['published_until'] ?? null) {
                            $indicators['published_until'] = 'Đến ngày ' . Carbon::parse($data['published_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),
                SelectFilter::make('class_subject_id')->label('Lớp học')
                    ->relationship('ClassSubject.ClassR', 'name'),
                SelectFilter::make('class_subject_id')->label('Giáo viên')
                    ->relationship('ClassSubject.User', 'name'),
                SelectFilter::make('room_id')->label('Phòng học')
                    ->relationship('Room', 'name'),
                SelectFilter::make('Study_id')->label('Ca học')
                    ->relationship('Study', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCalendarIncreases::route('/'),
            'create' => Pages\CreateCalendarIncrease::route('/create'),
            'edit' => Pages\EditCalendarIncrease::route('/{record}/edit'),
        ];
    }
}
