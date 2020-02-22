<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserRegistered;
use App\Mail\UserRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{
    public function handle(UserRegistered $event)
    {
        Mail::to($event->user->getEmail())->send(new UserRegistration($event->user));
    }
}
