<?php

namespace App\Filament\Resources\BlogPostStatResource\Pages;

use App\Filament\Resources\BlogPostStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogPostStat extends EditRecord
{
    protected static string $resource = BlogPostStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
