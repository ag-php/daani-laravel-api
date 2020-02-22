@component('mail::message')
    Hi

    You need to verify you email in order to get access.

    @component('mail::button', ['url' => $verificationLink])
        Verify Now
    @endcomponent

    Thanks, <br>
    {{ config('app.name') }}
@endcomponent


