<?php

use Faker\Generator as Faker;


$factory->define(App\Post::class, function (Faker $faker) {
    $path = $faker->image(storage_path('app/public/posts/images'), 500, 350);
    $img_url = str_replace(storage_path('app/public/'), '', $path);
	$users = App\User::pluck('id')->toArray();
    return [
        'contents' => $faker->realText(300),
        'date' =>\Carbon\Carbon::createFromTimeStamp($faker->dateTimeBetween('-7 days', '+7 days')->getTimestamp()),
        'user_id' => $faker->randomElement($users),
        'image_url' => $img_url
    ];
});
