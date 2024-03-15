<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectImgResource\Pages;
use App\Models\ProjectImg;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class ProjectImgResource extends Resource
{
    protected static ?string $model = ProjectImg::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Quản lý Ảnh';
    protected static ?string $navigationGroup = 'Quản lý sự kiện';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('Hình ảnh')
                    ->image()
                    ->imageEditor()
                    ->required()
                    ->columnSpan(2),
                TextInput::make('name')
                    ->label('Tên ảnh')
                    ->required(),
                DateTimePicker::make('date')
                    ->label('Ngày đăng')
                    ->required(),
                Select::make('project_id')
                    ->relationship(name: 'project', titleAttribute: 'name')->label('Dự án')
                    ->required()
                    ->filled(),
                Toggle::make('status')
                    ->label('Trạng thái')
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Tên ảnh')
                    ->searchable(),
                ImageColumn::make('image')
                    ->label('Hình ảnh'),
                TextColumn::make('date')
                    ->label('Ngày đăng'),
                TextColumn::make('project.name')
                    ->label('Dự án'),
                ToggleColumn::make('status')
                    ->label('Trạng thái'),
            ])
            ->filters([
                SelectFilter::make('project_id')->label('Người đánh giá')
                    ->relationship('project', 'name'),

                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')->label('Từ ngày')
                            ->placeholder(fn ($state): string => 'Dec 18, ' . now()->subYear()->format('Y')),
                        Forms\Components\DatePicker::make('published_until')->label('Đến ngày')
                            ->placeholder(fn ($state): string => now()->format('M d, Y')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                            )
                            ->when(
                                $data['published_until'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
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
            'index' => Pages\ListProjectImgs::route('/'),
            'create' => Pages\CreateProjectImg::route('/create'),
            'edit' => Pages\EditProjectImg::route('/{record}/edit'),
        ];
    }
}
