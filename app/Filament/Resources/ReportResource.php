<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Models\Report;
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


class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    public static function getNavigationLabel(): string
    {
        return __("dashboard.reports.plural_label");
    }

    public static function getPluralLabel(): ?string
    {
        return __("dashboard.reports.plural_label");
    }

    public static function getLabel(): ?string
    {
        return __("dashboard.reports.label");
    }

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('full_name')->required()->label('الاسم'),
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

            TextColumn::make('full_name')
                ->searchable()
                ->sortable()
            ->label('الاسم الكامل'),

            TextColumn::make('phone')
                ->label('رقم الهاتف')
                ->sortable(),

            TextColumn::make('reporter_role')
                ->label('الصفة')
                ->sortable(),

            TextColumn::make('title')
                ->label('عنوان البلاغ')
                ->searchable(),

            TextColumn::make('category')
                ->label('نوع الحادث')
                ->sortable(),

            TextColumn::make('impact')
                ->label('مستوى التأثير')
                ->sortable(),

            TextColumn::make('ongoing')
                ->label('المشكلة مستمرة؟')
               ->getStateUsing(fn ($record) => $record->ongoing ? 'نعم' : 'لا'),

            TextColumn::make('who_affected')
                ->label('من المتأثر؟')
                ->sortable(),

            TextColumn::make('sensitive_data')
                ->label('هل البيانات حساسة؟')
                ->sortable(),

//            TextColumn::make('follow_up')
//                ->label('طريقة المتابعة')
//                ->sortable(),

            TextColumn::make('status')
                ->label('الحالة')
                ->badge()
                ->colors([
                    'primary' => 'pending',
                    'success' => 'resolved',
                    'danger' => 'rejected',
                ])
                ->sortable(),

            TextColumn::make('created_at')
                ->label('تاريخ الإنشاء')
                ->dateTime('Y-m-d H:i'),

//            TextColumn::make('updated_at')
//                ->label('آخر تعديل')
//                ->dateTime('Y-m-d H:i'),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
