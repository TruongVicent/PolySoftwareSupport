<?php

namespace App\Filament\Resources;

use App\Enums\IpAddress;
use App\Enums\TimeLearn;
use App\Filament\Resources\CalendarIncreaseResource\Pages;
use App\Models\CalendarIncrease;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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
use Illuminate\Support\Carbon;

class CalendarIncreaseResource extends Resource
{
    protected static ?string $model = CalendarIncrease::class;
    protected static ?string $label = 'Lịch tăng cường';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quản lý Hỗ trợ tăng cường';

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
                        }
                    ])
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
                        }
                    ])
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
                        }
                    ])
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
                TextEntry::make('file_present')
                    ->label('File đã upload'),
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
                Tables\Actions\Action::make('calendarincrease')
                    ->label('Điểm danh')
                    ->form([
                        FileUpload::make('file_present')
                            ->label('Tải file điểm danh lên (excel)')
                    ])
                    ->action(function (CalendarIncrease $CalendarIncrease, $data) {
                        $CalendarIncrease->save();
                        $filePresent = $data['file_present'];

                        // Gán giá trị cho model và lưu
                        $CalendarIncrease->file_present = $filePresent;
                        $CalendarIncrease->save();

                    })
                    ->hidden(
                        function (CalendarIncrease $calendarIncrease) {
                            $enumIp = IpAddress::cases();
                            $requestIp = request()->ip();

                            $time = TimeLearn::cases();
                            $current_time = Carbon::now('Asia/Ho_Chi_Minh');
                            $hour = $current_time->format('H:i');

                            foreach ($time as $t) {
                                // Cộng thêm 2 tiếng vào khung giờ
                                $date = Carbon::parse($t->value)->addMinutes(120);
                                $endTime = $date->format('H:i');
                                // So sánh khung giờ hiện tại với khung giờ kết thúc
                                if ($hour >= $t->value && $hour <= $endTime) {
                                    // Hiển thị hidden
                                    return false;
                                }
                            }
                            if (now()->diffInMinutes($endTime) >= 120) {
                                // Ẩn hidden
                                return true;
                            }
                            //  if (!in_array($requestIp, $enumIp)) {
                            //     return false;
                            // }
                            // return true;
                            /// lấy giờ của ca

                        }
                    )
                    ->color('success'),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
