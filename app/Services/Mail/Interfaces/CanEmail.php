<?php

declare(strict_types=1);

namespace App\Services\Mail\Interfaces;

interface CanEmail
{
    public function to(): String;
}
