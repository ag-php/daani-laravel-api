<?php

namespace App\Events\Auth;

use App\Repos\User;

class RequestedEmailVerificationLink
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
