<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Users', 124)->value(123),
            Card::make('Sales', '$4,567')->value('$4,567'),
            Card::make('Active Sessions', 89)->value(89),
        ];
    }
}
