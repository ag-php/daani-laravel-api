<?php

namespace App\Providers;

use App\Repos\Models\Cruise;
use App\Repos\Models\Experience;
use App\Repos\Models\Itinerary;
use App\Repos\Models\Promotion;
use App\Repos\Models\PromotionCategory;
use App\Repos\Models\Room;
use App\Repos\Models\User;
use App\Repos\Product;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        Relation::morphMap([
            'product' => Product::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
