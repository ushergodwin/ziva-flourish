<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Carbon;

class BookingDisplayController extends Controller
{
    public function index()
    {
        //parse('26-Jul-2025')
        $today = Carbon::today()->toDateString();

        $bookings = Booking::with('service')
            ->where('status', '!=', 'cancelled')
            ->whereDate('preferred_date', $today)
            ->orderBy('preferred_time')
            ->get();

        return view('ziva.booking-screen', [
            'bookings' => $bookings,
            'today' => Carbon::today()->format('l, d M Y'),
        ]);
    }
}