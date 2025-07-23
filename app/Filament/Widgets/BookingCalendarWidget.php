<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class BookingCalendarWidget extends FullCalendarWidget
{
    protected static ?string $heading = 'Booking Calendar';
    protected static ?string $description = 'View and manage bookings in a calendar format.';

    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {

        return Booking::query()
            ->where('starts_at', '>=', $fetchInfo['start'])
            ->where('ends_at', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn(Booking $event) => [
                    'title' => $event->name . ' - ' . $event->service->name,
                    'start' => $event->starts_at,
                    'end' => $event->preferred_date->toIso8601String(),
                    'url' => route('filament.resources.bookings.edit', $event),
                    'shouldOpenUrlInNewTab' => true
                ]
            )
            ->all();
    }
}