<?php

namespace App\Providers;

use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Repos\Order;
use App\Repos\Product;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         Product::class =>  ProductPolicy::class,
         Order::class => OrderPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
