<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'description' => $faker->sentence,
        'status' => $status = $faker->randomElement(['pending', 'in-progress', 'completed']),
        'progress' => $status == 'pending' ? 0 : ( $status == 'completed' ? 100 : $faker->numberBetween(1, 99)),
        'team' => [
        	[
        		"user_id" => $faker->numberBetween(0,50),
        		"designation" => $faker->word
        	],
        	[
        		"user_id" => $faker->numberBetween(0,50),
        		"designation" => $faker->word
        	]
        ],
        'start_date' => $faker->date,
        'due_date' => $faker->date,
        'project_id' => $faker->numberBetween(0,50)
    ];
});
