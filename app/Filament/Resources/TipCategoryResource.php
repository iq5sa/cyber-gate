<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipCategoryResource\Pages;
use App\Filament\Resources\TipCategoryResource\RelationManagers;
use App\Models\TipCategory;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TipCategoryResource extends Resource
{
    protected static ?string $model = TipCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function getNavigationLabel(): string
    {
        return __("dashboard.navigation.tips_category");
    }

    public static function getPluralLabel(): ?string
    {
        return  __("dashboard.navigation.tips_category");
    }

    public static function getLabel(): ?string
    {
        return __("dashboard.navigation.category");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('created_at')->since(),

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
            'index' => Pages\ListTipCategories::route('/'),
            'create' => Pages\CreateTipCategory::route('/create'),
            'edit' => Pages\EditTipCategory::route('/{record}/edit'),
        ];
    }
}
