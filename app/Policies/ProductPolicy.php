<?php

namespace App\Policies;

use App\Repos\Product;
use App\Repos\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Product $product)
    {
        return $user->getId() === $product->getUserId();
    }

    public function delete(User $user, Product $product)
    {
        return $user->getId() === $product->getUserId();
    }
}
