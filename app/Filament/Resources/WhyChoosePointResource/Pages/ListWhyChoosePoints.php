<?php

namespace App\Filament\Resources\WhyChoosePointResource\Pages;

use App\Filament\Resources\WhyChoosePointResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWhyChoosePoints extends ListRecords
{
    protected static string $resource = WhyChoosePointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
