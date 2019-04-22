<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    $path = $faker->image(storage_path( 'app/public/users/profile/images'), 50, 50);
    $img_url = str_replace(storage_path('app/public/'), '', $path);
    return [
        'email' => $faker->unique()->safeEmail,
        'profile_image_url' => $img_url,
        'lastname' => $faker->lastName(),
        'firstname' => $faker->name(),
        'address' => $faker->streetAddress(),
        'postal_code' => $faker->postcode(),
        'city' => $faker->city(),
        'country' => $faker->state(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10)
    ];
});
