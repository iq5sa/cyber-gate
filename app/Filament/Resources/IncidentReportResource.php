<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncidentReportResource\Pages;
use App\Filament\Resources\IncidentReportResource\RelationManagers;
use App\Models\IncidentReport;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncidentReportResource extends Resource
{
    protected static ?string $model = IncidentReport::class;

    public static function getNavigationLabel(): string
    {
        return __("dashboard.incident_reports.plural_label");
    }

    public static function getPluralLabel(): ?string
    {
        return __("dashboard.incident_reports.plural_label");
    }

    public static function getLabel(): ?string
    {
        return __("dashboard.incident_reports.label");
    }

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->label('الاسم'),
            TextInput::make('email')->email()->required()->label('البريد الإلكتروني'),

            Select::make('incident_type')
                ->label('نوع الحادث')
                ->required()
                ->options([
                    'technical' => 'تقني',
                    'security' => 'أمني',
                    'hr' => 'موارد بشرية',
                    'other' => 'أخرى',
                ]),

            DatePicker::make('incident_date')
                ->required()
                ->label('تاريخ الحادث'),

            Textarea::make('incident_description')
                ->required()
                ->label('وصف الحادث')
                ->rows(5),

            FileUpload::make('attachments')
                ->label('المرفقات')
                ->directory('incident-reports')
                ->multiple()
                ->maxSize(10240) // 10MB per file
                ->acceptedFileTypes([
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                ])
                ->preserveFilenames()
                ->visibility('public'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->label('الاسم'),
            TextColumn::make('incident_type')->label('نوع الحادث'),
            TextColumn::make('incident_date')->label('تاريخ الحادث'),
            TextColumn::make('created_at')->dateTime('Y-m-d')->label('تاريخ الإنشاء'),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListIncidentReports::route('/'),
            'create' => Pages\CreateIncidentReport::route('/create'),
            'edit' => Pages\EditIncidentReport::route('/{record}/edit'),
        ];
    }
}
