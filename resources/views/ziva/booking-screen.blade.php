<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> {{ config('app.name')}} Today's Bookings</title>
    <meta http-equiv="refresh" content="60">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('ziva-logo.png')}}" type="images/x-icon" rel="shortcut icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #2a3b2c;
            color: #fff;
            padding: 2rem;
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 2rem;
        }

        .booking-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
        }

        .booking-card {
            background: #1e1e1e;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 0 10px rgba(255, 165, 0, 0.5);
        }

        .booking-time {
            font-size: 2rem;
            font-weight: bold;
            color: #ffa500;
        }

        .booking-name {
            font-size: 1.8rem;
            margin-top: 0.5rem;
        }

        .service-name {
            font-size: 1.2rem;
            color: #ccc;
        }
    </style>
</head>
<body>
    <h1>{{ config('app.name')}} Bookings - {{ $today }}</h1>

    <div class="booking-list">
        @forelse ($bookings as $booking)
            <div class="booking-card">
                <div class="booking-time">
                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $booking->preferred_time)->format('g:i A') }}
                </div>
                <div class="booking-name">{{ $booking->name }}</div>
                <div class="service-name">{{ $booking->service->name ?? 'Unknown Service' }}</div>
            </div>
        @empty
            <p style="font-size: 2rem; text-align: center;">No bookings today!</p>
        @endforelse
    </div>
</body>
</html>
