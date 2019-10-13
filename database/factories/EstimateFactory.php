<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estimate;
use Faker\Generator as Faker;

$factory->define(Estimate::class, function (Faker $faker) {
    return [
        'time' => $time = $faker->numberBetween(50, 5000),
        'price_per_hour' => $per_hour = $faker->numberBetween(50, 500),
        'equipment_cost' => $e_cost =  $faker->numberBetween(100, 500),
        'sub_contractors' => $faker->words(4, true),
        'sub_contractors_cost' => $s_cost = $faker->numberBetween(100, 500),
        'similar_projects' => $faker->numberBetween(0, 25),
        'rating' => $faker->numberBetween(1, 10),
        'currency_id' => 1,
        'estimate' => ($time * $per_hour) + $e_cost + $s_cost,
        'start' => $faker->date,
        'end' => $faker->date
    ];
});
