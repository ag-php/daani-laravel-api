<?php

namespace App\Mail;

use App\Repos\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    public function getVerificationLink()
    {
        return env('FRONTEND_APP_URL').http_build_query(['code' => base64_encode($this->user->getApiToken())]);
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.registration')->with(['verificationLink' => $this->getVerificationLink()]);
    }
}
