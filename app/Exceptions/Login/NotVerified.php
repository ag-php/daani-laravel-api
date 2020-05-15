<?php

namespace App\Exceptions\Login;

use Nuwave\Lighthouse\Exceptions\RendersErrorsExtensions;

class NotVerified extends \Exception implements RendersErrorsExtensions
{
    private $reason = "Please verify your email";
    protected $message = "Please verify your email";

    public function isClientSafe() : bool
    {
       return true;
    }

    public function getCategory()
    {
        return "Authentication";
    }

    public function extensionsContent(): array
    {
        return [
            'verified' => false,
            'reason' => $this->reason,
        ];
    }

}

