<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Hash;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $label = 'Người dùng';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Tên tài khoản'),
                TextInput::make('email')
                    ->required()
                    ->regex('/^.+@.+$/i')
                    ->email()
                    ->unique()
                    ->validationMessages([
                        'unique' => 'Tài khoản đã được đăng kí.',
                    ]),
                TextInput::make('code')
                    ->required()
                    ->label('Mã nhân viên')
                    ->unique()
                    ->validationMessages([
                        'unique' => 'Mã nhân viên đã được tạo.',
                    ]),
                TextInput::make('password')
                    ->required()
                    ->label('Password')
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->minLength(6)
                    ->maxLength(16),
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
                    ->label('Tên tài khoản'),
                TextColumn::make('email')
                    ->icon('heroicon-m-envelope')
                    ->label('Email'),
                TextColumn::make('code')
                    ->badge()
                    ->label('Mã nhân viên'),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
