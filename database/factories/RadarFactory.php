<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Radar::class, function (Faker $faker) {
    return [
        'created_at' => $faker->dateTime,
        'number' => $faker->regexify('[A-Z]{3}\d{3}'),
        'distance' => $faker->numberBetween(0, 200),
        'time' => $faker->numberBetween(10, 200),
        'driver_id' =>factory(\App\Models\Driver::class)->create()->id
    ];
});
