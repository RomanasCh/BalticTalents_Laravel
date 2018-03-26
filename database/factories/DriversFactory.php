<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Drivers::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'city' => $faker->city
    ];
});
