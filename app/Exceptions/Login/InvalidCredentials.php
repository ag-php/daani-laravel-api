<?php

namespace App\Exceptions\Login;

use Nuwave\Lighthouse\Exceptions\RendersErrorsExtensions;

class InvalidCredentials extends \Exception implements RendersErrorsExtensions
{
    private $reason = "invalid credentials";
    protected $message = "invalid credentials";

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
            'reason' => $this->reason,
        ];
    }

}

