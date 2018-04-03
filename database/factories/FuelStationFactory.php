<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\FuelStation::class, function (Faker $faker) {
    return [
        'created_at' => $faker->dateTime,
        'coordinate_x' => $faker->randomFloat(2, -100, 100),
        'coordinate_y' => $faker->randomFloat(2, -100, 100),
        'name' => $faker->company,
        'state' => $faker->address

    ];
});
