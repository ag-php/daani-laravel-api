@component('mail::message')
    Hi

    You need to verify you email in order to reset your password

    @component('mail::button', ['url' => $verificationLink])
        Verify Now
    @endcomponent

    Thanks, <br>
    {{ config('app.name') }}
@endcomponent


