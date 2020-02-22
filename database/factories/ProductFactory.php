<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Repos\Product::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'description' => $faker->name,
        'purchase_date' => $faker->date(),
        'usable_date' => $faker->date(),
        'district' => $faker->state,
        'full_address' => $faker->address,
        'is_available' => 1,
        'user_id' => \App\Repos\User::all()->random(1)->first()->id,
        'cat_id' => \App\Repos\ProductCategory::all()->random(1)->first->id,
    ];
});
