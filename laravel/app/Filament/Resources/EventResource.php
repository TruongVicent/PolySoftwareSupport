<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Infolist;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Infolists\Components\ImageEntry;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-2-stack';

    protected static ?string $label = 'Sự kiện';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->image()
                    ->label('Ảnh')
                    ->required()
                    ->columnSpan(2),

                TextInput::make('name')
                    ->label('Sự kiện')
                    ->required(),

                TextInput::make('target_audience')
                    ->label('Đối tượng')
                    ->required(),

                Select::make('event_type_id')
                    ->relationship(name: 'EventType', titleAttribute: 'name')
                    ->label('Loại sự kiện')
                    ->required(),

                DateTimePicker::make('start_time')
                    ->label('Thời gian bắt đàu')
                    ->required(),

                DateTimePicker::make('end_time')
                    ->label('Thời gian kết thúc')
                    ->required(),

                MarkdownEditor::make('content')
                    ->label('Nội dung')
                    ->columnSpan(2)
                    ->required(),

                Toggle::make('status')
                    ->label('Trạng thái')
                    ->inline(false),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name')
                    ->label('Sự kiện')
                    ->columnSpanFull(),

                TextEntry::make('EventType.name')
                    ->label('Loại sự kiện'),

                TextEntry::make('target_audience')
                    ->label('Đối tượng'),

                TextEntry::make('start_time')
                    ->label('Thời gian bắt đàu'),

                TextEntry::make('end_time')
                    ->label('Thời gian kết thúc'),

                TextEntry::make('content')
                    ->label('Nội dung')
                    ->columnSpanFull(),

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('EventType.name')
                    ->label('Loại sự kiện'),

                TextColumn::make('name')
                    ->searchable()
                    ->icon('heroicon-m-sparkles')
                    ->label('Tên sự kiện'),

                TextColumn::make('target_audience')
                    ->label('Đối tượng'),

                ImageColumn::make('image')
                    ->label('Ảnh'),

                ToggleColumn::make('status')
                    ->label('Trạng thái')

            ])
            ->filters([
                SelectFilter::make('event_type_id')->label('Loại sự kiện')
                    ->relationship('EventType', 'name'),
                Tables\Filters\Filter::make('start_time')
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
                                fn(Builder $query, $date): Builder => $query->whereDate('start_time', '>=', $date),
                            )
                            ->when(
                                $data['published_until'] ?? null,
                                fn(Builder $query, $date): Builder => $query->whereDate('start_time', '<=', $date),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}


