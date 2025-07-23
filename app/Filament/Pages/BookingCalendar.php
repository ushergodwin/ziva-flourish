<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use Filament\Pages\Page;
use Carbon\Carbon;

class BookingCalendar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Booking Calendar';
    protected static ?string $title = 'Booking Calendar';
    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.booking-calendar';

    public function getViewData(): array
    {
        return getCalendarBookings();
    }
}
