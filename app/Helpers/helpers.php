<?php

// is active page function

use App\Models\Booking;
use App\Models\PageSetting;
use App\Models\Service;
use Carbon\Carbon;

function isActivePage($routeName)
{
    return request()->routeIs($routeName);
}
function page_settings($page_id)
{
    return PageSetting::where('page_id', $page_id)->first();
}

function home_page_services()
{
    return Service::where('show_on_home', 1)
        ->where('is_active', 1)
        ->orderBy('id', 'desc')
        ->get();
}

function getCalendarBookings()
{
    $bookings = Booking::with(['service'])
        ->where('status', '!=', 'cancelled')
        ->orderBy('preferred_date', 'asc')
        ->get();

    $events = $bookings->map(function ($b) {
        $time = $b->preferred_time
            ? ' (' . Carbon::createFromFormat('H:i:s', $b->preferred_time)->format('g:i A') . ')'
            : '';

        $serviceName = $b->service->name ?? 'Unknown Service';

        return [
            'title' => $b->name . ' - ' . $serviceName . $time,
            'start' => $b->preferred_date . 'T' . ($b->preferred_time ?? '00:00:00'),
            'url' => route('filament.admin.resources.bookings.edit', $b),
        ];
    })->toArray();

    return [
        'bookings' => $bookings,
        'events' => $events,
    ];
}