<?php

namespace App\Filament\Resources\MailSubscriberResource\Pages;

use App\Filament\Resources\MailSubscriberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMailSubscribers extends ListRecords
{
    protected static string $resource = MailSubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
