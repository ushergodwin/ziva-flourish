<?php

namespace App\Filament\Resources\OurImpactResource\Pages;

use App\Filament\Resources\OurImpactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurImpact extends EditRecord
{
    protected static string $resource = OurImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
