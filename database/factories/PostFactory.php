<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
	$users = App\User::pluck('id')->toArray();
    return [
        'title' => $faker->text,
        'contents' => $faker->text,
        'date' => $faker->dateTimeThisMonth->format('d-m-Y'),
        'user_id' => $faker->randomElement($users),
    ];
});
