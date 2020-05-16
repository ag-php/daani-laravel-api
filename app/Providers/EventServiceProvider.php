<?php

namespace App\Providers;

use App\Events\Auth\RequestedEmailVerificationLink;
use App\Events\Auth\RequestedPasswordReset;
use App\Events\Auth\UserRegistered;
use App\Events\Product\Created;
use App\GraphQL\Mutations\Product\Create;
use App\Listeners\Auth\SendEmailVerification;
use App\Listeners\Auth\SendPasswordResetEmail;
use App\Listeners\Auth\SendRegistrationEmail;
use App\Listeners\Product\LinkUploadedImages;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        RequestedPasswordReset::class => [
            SendPasswordResetEmail::class
        ],

        RequestedEmailVerificationLink::class => [
          SendEmailVerification::class
        ],

        UserRegistered::class => [
            SendRegistrationEmail::class
        ],

        Created::class => [
            LinkUploadedImages::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
