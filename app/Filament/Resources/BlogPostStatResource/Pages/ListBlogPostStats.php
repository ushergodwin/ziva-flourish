<?php

namespace App\Filament\Resources\BlogPostStatResource\Pages;

use App\Filament\Resources\BlogPostStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogPostStats extends ListRecords
{
    protected static string $resource = BlogPostStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
