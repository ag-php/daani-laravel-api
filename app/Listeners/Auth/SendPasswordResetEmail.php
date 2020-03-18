<?php

namespace App\Listeners\Auth;

use App\Events\Auth\RequestedPasswordReset;
use App\Events\Auth\UserRegistered;
use App\Mail\PasswordReset;
use App\Mail\UserRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetEmail implements ShouldQueue
{
    public function handle(RequestedPasswordReset $event)
    {
        Mail::to($event->user->getEmail())->send(new PasswordReset($event->user));
    }
}
