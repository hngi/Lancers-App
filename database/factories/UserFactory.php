<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\SubscriptionPlan;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/*
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
*/

$factory->define(SubscriptionPlan::class, function (Faker $faker) {
    return [
        'name' => 'starter',
        'description' => 'Starter plan',
        'features' => json_encode([
            "limited_projects"=>true, 
            "allowed_projects"=>3, 
            "collaborators"=>2, 
            "documents"=>1,
            "support"=>false, 
            "beta_access"=>false
    ]),
        'price' => 0, // double
        
    ];
});


$factory->define(SubscriptionPlan::class, function (Faker $faker) {
    return [
        'name' => 'pro',
        'description' => 'second level subscription plan',
        'features' => json_encode([
            "limited_projects"=>false, 
          "allowed_projects"=>null, 
          "collaborators"=>5, 
          "documents"=>3,
          "support"=>false, 
          "beta_access"=>false
    ]),
        'price' => 24.99, // double
        
    ];
});


$factory->define(SubscriptionPlan::class, function (Faker $faker) {
    return [
        'name' => 'pro_plus',
        'description' => 'third level subscription plan',
        'features' => json_encode([
            "limited_projects"=>false, 
          "allowed_projects"=>null, 
          "collaborators"=>null, 
          "documents"=>null,
          "support"=>true, 
          "beta_access"=>true
    ]),
        'price' => 79.99, // double
        
    ];
});

