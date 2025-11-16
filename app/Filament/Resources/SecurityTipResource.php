<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SecurityTipResource\Pages;
use App\Models\SecurityTip;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SecurityTipResource extends Resource
{
    protected static ?string $model = SecurityTip::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function getNavigationLabel(): string
    {
        return __('dashboard.navigation.security_tips');
    }

    public static function getPluralLabel(): ?string
    {
        return __('dashboard.navigation.security_tips');
    }

    public static function getLabel(): ?string
    {
        return __('dashboard.navigation.tips');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('title')
                    ->required()
                    ->label('العنوان')
                    ->reactive()
                    ->afterStateUpdated(function (?string $state, callable $set) {
                        $slug = Str::slug($state ?? '');
                        $set('slug', $slug);
                    }),

                TextInput::make('slug')
                    ->label('الرابط (slug)')
                    ->required()
                    ->helperText('يمكن تعديل هذا الرابط يدوياً إذا رغبت.'),

                RichEditor::make('content')
                    ->label('المحتوى')
                    ->required()
                    ->columnSpan('full')
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'h2', 'h3', 'bulletList', 'orderedList',
                        'blockquote', 'link', 'codeBlock', 'undo', 'redo',
                    ])
                    ->maxLength(10000)
                    ->helperText('اكتب المحتوى الكامل للمقال هنا. أدوات التنسيق متاحة.'),

                FileUpload::make('image')
                    ->label('الصورة الرئيسة')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9', '4:3', '1:1', '2:3',
                    ])
                    ->directory('images')
                    ->preserveFilenames()
                    ->maxSize(5120) // in KB => 5 MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->helperText('قم برفع صورة (JPG، PNG، WEBP). الحجم الأقصى: 5 ميغابايت')
                    ->required()
                    ->downloadable()
                    ->visibility('public'),

                FileUpload::make('video_path')
                    ->label('ملف الفيديو')
                    ->acceptedFileTypes(['video/mp4', 'video/ogg', 'video/webm'])
                    ->maxSize(102400) // in KB => 100 MB
                    ->helperText('الصيغ المسموح بها: MP4، OGG، WEBM. الحجم الأقصى: 100 ميغابايت')
                    ->directory('videos')
                    ->visibility('public')
                    ->downloadable()
                    ->previewable(),


                TextInput::make('excerpt')
                    ->label('عنوان الفيديو ان وجد')
                    ->nullable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('الصورة'),
                Tables\Columns\TextColumn::make('title')->label(__('dashboard.general.title')),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الانشاء')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSecurityTips::route('/'),
            'create' => Pages\CreateSecurityTip::route('/create'),
            'edit' => Pages\EditSecurityTip::route('/{record}/edit'),
        ];
    }
}
