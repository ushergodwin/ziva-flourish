@component('mail::message')
# Booking Status Updated

Dear {{ $booking->name }},

Your booking for **{{ $booking->service->name ?? 'a service' }}** has been updated to the following status:

@component('mail::panel')
**{{ ucfirst($booking->status) }}**
@endcomponent

If you have any questions, feel free to contact us.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
