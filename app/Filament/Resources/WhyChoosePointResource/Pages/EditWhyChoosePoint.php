<?php

namespace App\Filament\Resources\WhyChoosePointResource\Pages;

use App\Filament\Resources\WhyChoosePointResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWhyChoosePoint extends EditRecord
{
    protected static string $resource = WhyChoosePointResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}