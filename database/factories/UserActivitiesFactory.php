<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
	$users = App\User::pluck('id')->toArray();
	$activities = App\Activity::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'activity_id' => $faker->randomElement($activities),
    ];
});
