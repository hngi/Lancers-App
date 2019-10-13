<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker, $user) {
	$countries = \App\Country::select('id')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user['user_id'],
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'street' => $faker->streetName,
        'street_number' => $faker->buildingNumber,
        'city' => $faker->city,
        'zipcode' => $faker->postcode,
        'country_id' => $country = $faker->randomElement($countries),
        'state_id' => \App\State::inRandomOrder()->get()->pluck('id')->toArray()[0] ,
        'contacts' => [
        	[
        		"name" => $faker->name,
        		"email" => $faker->email,
        		"phone" => $faker->phoneNumber
        	],
        	[
        		"name" => $faker->name,
        		"email" => $faker->email,
        		"phone" => $faker->phoneNumber
        	]
        ],
        'timezone' => $faker->timezone
    ];
});
