<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;


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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name')
                    ->label('Tên dự án')
                    ->columnSpanFull(),
                TextEntry::make('ProjectType.name')
                    ->label('Loại dự án'),
                TextEntry::make('start_date')
                    ->label('Đối tượng'),
                TextEntry::make('start_time')
                    ->label('Thời gian bắt đàu'),
                TextEntry::make('end_date')
                    ->label('Thời gian kết thúc'),

            ]);

    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên dự án')
                    ->searchable(),
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
                SelectFilter::make('project_type_id')
                    ->relationship('ProjectType', 'name')
                    ->label('Loại dự án'),

                Filter::make('start_date')
                    ->form([
                        DatePicker::make('published_from')->label('Từ ngày')
                            ->placeholder(fn($state): string => 'Dec 18, ' . now()->subYear()->format('Y')),
                        DatePicker::make('published_until')->label('Đến ngày')
                            ->placeholder(fn($state): string => now()->format('M d, Y')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'] ?? null,
                                fn(Builder $query, $date): Builder => $query->whereDate('start_date', '>=', $date),
                            )
                            ->when(
                                $data['published_until'] ?? null,
                                fn(Builder $query, $date): Builder => $query->whereDate('start_date', '<=', $date),
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
            RelationManagers\ProjectMemberRelationManager::class,
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
