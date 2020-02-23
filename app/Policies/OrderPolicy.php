<?php

namespace App\Policies;

use App\Repos\Order;
use App\Repos\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    private $order;
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function create(User $user,$args)
    {
        if($this->order->ByUserAndProductId($user->getId(),$args['product_id'])->count() > 0) {
            $this->deny('Sorry, your level is not high enough to do that!');
            return;
        }
        return true;
    }
}
