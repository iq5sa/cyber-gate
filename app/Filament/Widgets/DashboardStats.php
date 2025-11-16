<?php

namespace App\Filament\Widgets;

use App\Models\Legislation;
use App\Models\IncidentReport;
use App\Models\SecurityTip;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make('Total Legislations', Legislation::count())
                ->label('اللوائح والتشريعات')
                ->description('عدد اللوائح والتشريعات')
                ->descriptionIcon('heroicon-o-document-text'),

            Stat::make('Total Incident Reports', IncidentReport::count())
                ->label('الحوادث السيبرانية')
                ->description('عدد تقارير الحوادث')
                ->descriptionIcon('heroicon-o-exclamation-circle'),

            Stat::make('Total Security Tips', SecurityTip::count())
                ->label('الارشادات التوعوية')
                ->description('عدد  الارشادات التوعوية')
                ->descriptionIcon('heroicon-o-shield-check'),

            Stat::make('Published Security Tips', SecurityTip::where('is_published', 1)->count())
                ->label('الارشادات المنشورة')
                ->description('عدد الارشادات المنشورة')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Unpublished Security Tips', SecurityTip::where('is_published', 0)->count())
                ->label('النصائح غير المنشورة')
                ->description('عدد النصائح الغير المنشورة')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('danger'),

            Stat::make('Unpublished Security Tips', SecurityTip::where('is_published', 0)->count())
                ->description('عدد المستخدمين في لوحة التحكم')
                ->label('المستخدمين')
                ->descriptionIcon('heroicon-o-users')
        ];
    }
}
