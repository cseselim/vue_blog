<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'category_id' => App\Category::all()->random()->id,
        'user_id' => App\User::all()->random()->id,
        'title' => $faker->text(60),
        'description' => $faker->realText(),
        'image' => $faker->image('public/uploadimage/',400,400,null,false),
    ];
});
