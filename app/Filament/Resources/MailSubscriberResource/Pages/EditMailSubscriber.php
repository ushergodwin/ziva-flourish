<?php

namespace App\Filament\Resources\MailSubscriberResource\Pages;

use App\Filament\Resources\MailSubscriberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMailSubscriber extends EditRecord
{
    protected static string $resource = MailSubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
