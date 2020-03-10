<?php

namespace App\Policies;

use App\Repos\Product;
use App\Repos\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update()
    {
        return false;
    }

    public function view(){
        dd('asd');
    }
}
