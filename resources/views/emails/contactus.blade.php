@component('mail::message')
# {{$details['name']}}

{{$details['body']}}

@component('mail::button', ['url' => $details['url']])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
