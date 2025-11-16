<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getLabel(): ?string
    {
        return __("dashboard.users.label");
    }

    public static function getPluralLabel(): ?string
    {
        return __("dashboard.users.plural_label");
    }

    public static function getNavigationLabel(): string
    {
        return __("dashboard.users.plural_label");
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(100)->label(__("dashboard.users.name")),

            TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true)->label(__("dashboard.users.email")),

            TextInput::make('password')
                ->label(__("dashboard.users.password"))
                ->type('password')
                ->dehydrateStateUsing(fn ($state) => !empty($state) ? Hash::make($state) : null)
                ->dehydrated(fn ($state) => filled($state))
                ->maxLength(255)
                ->required(fn (string $context): bool => $context === 'create'),


//            DateTimePicker::make('email_verified_at')
//                ->label('Email Verified At')
//                ->nullable(),

            TextInput::make('remember_token')
                ->maxLength(100)
                ->hidden(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->label(__("dashboard.users.name")),
            TextColumn::make('email')->searchable()->label(__("dashboard.users.email")),
            TextColumn::make('email_verified_at')->searchable()->label(__("dashboard.users.email_verified_at")),
            TextColumn::make('created_at')->searchable()->label(__("dashboard.users.created_at"))->since(),
//            DateTimePicker::make('email_verified_at'),
//            DateTimePicker::make('created_at'),
        ])
            ->actions([
//                EditAction::make(),
//                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
