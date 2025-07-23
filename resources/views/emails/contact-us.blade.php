@component('mail::message')
# Hello,

You have received a new contact form submission from your website.

**Name:** {{ $details['name'] }}  
**Phone:** {{ $details['phone'] }}  
@if($details['email'])
**Email:** {{ $details['email'] }}  
@endif

---

**Message:**  
{{ $details['message'] }}

@component('mail::button', ['url' => config('app.url')])
Go to Website
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
