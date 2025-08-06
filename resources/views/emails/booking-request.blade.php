@component('mail::message')
# New Booking Request

You've received a new booking request with the following details:

- **Name:** {{ $details['name'] }}
- **Phone:** {{ $details['phone'] }}
@if(!empty($details['email']))
- **Email:** {{ $details['email'] }}
@endif
- **Preferred Date:** {{ \Carbon\Carbon::parse($details['preferred_date'])->format('M, d Y') }}
- **Time:** {{ \Carbon\Carbon::parse($details['preferred_date'])->format('H:s') }}
- **Service:** {{ $details['service_name'] }}
- **Number of People:** {{ $details['number_of_people'] }}
---

@if(!empty($details['message']))
**Message:**  
{{ $details['note'] ?? 'No additional message provided.' }}
@endif

@component('mail::button', ['url' => config('app.url')])
View Website
@endcomponent

Thanks and Regards,  
{{ config('app.name') }}
@endcomponent
