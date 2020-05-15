@component('mail::message')
    Hi

    Looks like you have request for email verification link.

    @component('mail::button', ['url' => $verificationLink])
        Verify Now
    @endcomponent

    Thanks, <br>
    {{ config('app.name') }}
@endcomponent


