<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegislationResource\Pages;
use App\Filament\Resources\LegislationResource\RelationManagers;
use App\Models\Legislation;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class LegislationResource extends Resource
{
    protected static ?string $model = Legislation::class;
    public static function getNavigationLabel(): string
    {
        return __("dashboard.legislations.plural_label");
    }

    public static function getPluralLabel(): ?string
    {
        return __("dashboard.legislations.plural_label");
    }

    public static function getLabel(): ?string
    {
        return __("dashboard.legislations.label");
    }

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('title')->label(__('dashboard.legislations.input_title'))->required(),
                Forms\Components\Textarea::make('description')->label(__('dashboard.legislations.input_description')),
                FileUpload::make('pdf_path')->label(__('dashboard.legislations.pdf_input'))
                    ->hint(" ملف PDF")
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('legislations')
                    ->visibility('public')
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('pdf_path'),
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
            'index' => Pages\ListLegislations::route('/'),
            'create' => Pages\CreateLegislation::route('/create'),
            'edit' => Pages\EditLegislation::route('/{record}/edit'),
        ];
    }
}
