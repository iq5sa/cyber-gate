<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SecurityTipResource\Pages;
use App\Models\SecurityTip;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
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

                Section::make('التفاصيل الأساسية')
                    ->collapsible()
                    ->description('ادخل التفاصيل الأساسية لهذا المحتوى.')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextInput::make('title')
                                    ->label('العنوان')
                                    ->required()
                                    ->reactive()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->columnSpanFull(),

                                TextInput::make('slug')
                                    ->label('الرابط (Slug)')
                                    ->required()
                                    ->helperText('يمكن تعديل الرابط يدوياً إذا رغبت.')
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpan(1),

                Section::make('حالة وتاريخ النشر')
                    ->collapsible()
                    ->schema([
                        ToggleButtons::make('status')->label('اختر حالة النشر')
                            ->inline()
                            ->options([
                                'draft' => 'مسودة',
                                'published' => 'نشر',
                                'archived' => 'ارشفة',
                            ])->colors([
                                'draft' => 'info',
                                'published' => 'success',
                                'archived' => 'warning',
                            ])
                            ->icons([
                                'draft' => 'heroicon-o-pencil',
                                'published' => 'heroicon-o-check-circle',
                                'archived' => 'heroicon-o-archive-box',
                            ])
                            ->required()
                            ,

                        DateTimePicker::make('published_at')
                            ->native(false)
                            ->label('تاريخ النشر')
                            ->default(now())
                            ->helperText('يمكنك تعديل تاريخ إنشاء المحتوى إذا رغبت.')
                            ->columnSpanFull(),
                    ])->grow()->columnSpan(1),

                Section::make('المحتوى التفصيلي')
                    ->collapsible()
                    ->description('اكتب المحتوى الكامل مع معاينة قبل النشر.')
                    ->schema([
                        Tabs::make('Content')
                            ->tabs([
                                Tabs\Tab::make('Write')
                                    ->label('المحتوى')
                                    ->schema([
                                        MarkdownEditor::make('content')
                                            ->label('')
                                            ->reactive() // <-- make it live so placeholder updates
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('Preview')
                                    ->label('معاينة')
                                    ->schema([
                                        Placeholder::make('preview')
                                            ->label('')
                                            ->content(function (GET $get){
                                                $html = Str::markdown($get('content') ?? '');
                                                return new HtmlString("
                                                    <div class='prose prose-neutral max-w-none'>
                                                        {$html}
                                                    </div>
                                                ");
                                        })
                                            ->columnSpan('full'),

                                    ]),
                            ]),

//                        Split::make([
//                            MarkdownEditor::make('content')
//                                ->label('المحتوى')
//                                ->required()
//                                ->columnSpan(1)
//                                ->helperText('أدوات تنسيق Markdown متاحة.'),
//                        ])->columnSpan(1),
                    ]),


                // --- Media Section ---
                Section::make('الصورة الرئيسية والفيديو')
                    ->description('قم برفع الصورة الرئيسية والفيديو.')
                    ->schema([
                        Split::make([
                            FileUpload::make('image')
                                ->label('الصورة الرئيسة')
                                ->image()
                                ->imageEditor()
                                ->imageCropAspectRatio('4:3')
                                ->directory('images')
                                ->preserveFilenames()
                                ->maxSize(10240)
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                ->helperText('رفع JPG، PNG، WEBP. الحجم الأقصى: 5 ميغابايت')
                                ->required()
                                ->downloadable()
                                ->visibility('public'),

                            FileUpload::make('video_path')
                                ->label('ملف الفيديو')
                                ->acceptedFileTypes(['video/mp4', 'video/ogg', 'video/webm'])
                                ->maxSize(2048000)
                                ->directory('videos')
                                ->visibility('public')
                                ->downloadable()
                                ->previewable()
                                ->helperText('رفع MP4، OGG، WEBM. الحجم الأقصى: 2 جيجابايت'),
                        ])->columnSpanFull(),


                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('الصورة'),
                Tables\Columns\TextColumn::make('title')->label(__('dashboard.general.title')),
                Tables\Columns\TextColumn::make('published_at')->label('تاريخ النشر')->date(),
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
