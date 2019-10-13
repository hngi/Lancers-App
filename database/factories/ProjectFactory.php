<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;


$factory->define(Project::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 50),
        'title' => $faker->words(2, true),
        'description' => $faker->sentence,
        'status' => $status = $faker->randomElement(['pending', 'in-progress', 'completed']),
        'progress' => $status == 'pending' ? 0 : ( $status == 'completed' ? 100 : $faker->numberBetween(1, 99)),
        'collaborators' => [
            [
                "user_id" => $faker->numberBetween(0,50),
                "designation" => $faker->word
            ],
            [
                "user_id" => $faker->numberBetween(0,50),
                "designation" => $faker->word
            ]
        ]
    ];
});
