<?php

namespace App\Listeners\Auth;

use App\Events\Auth\RequestedEmailVerificationLink;
use App\Mail\EmailVerification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailVerification implements ShouldQueue
{
    public function handle( $event)
    {
        Mail::to($event->user->getEmail())->send(new EmailVerification($event->user));
    }
}
