<?php

namespace App\Filament\Resources\BlogPostStatResource\Pages;

use App\Filament\Resources\BlogPostStatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogPostStat extends CreateRecord
{
    protected static string $resource = BlogPostStatResource::class;
}
