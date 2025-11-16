<?php

namespace App\Filament\Resources\SecurityTipResource\Pages;

use App\Filament\Resources\SecurityTipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSecurityTips extends ListRecords
{
    protected static string $resource = SecurityTipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
