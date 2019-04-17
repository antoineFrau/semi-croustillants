<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
	$activity_categ = App\Activity::pluck('id')->toArray();
    return [
    	'name' => $faker->text,
        'category_id' => $faker->randomElement($activity_categ),
    ];
});
