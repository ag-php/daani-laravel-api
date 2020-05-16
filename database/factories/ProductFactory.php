<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Repos\Product::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'slug' => $faker->name,
        'description' => $faker->name,
//        'address' => $faker->imageUrl(),
        'is_available' => 1,
        'user_id' => \App\Repos\User::all()->random(1)->first()->id,
        'cat_id' => \App\Repos\ProductCategory::all()->random(1)->first->id,
    ];
});
