<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "title" => $faker->words(5, true),
        "content" => $faker->paragraph(1),
        "created_at" => $faker->dateTime(),
        "updated_at" => $faker->dateTime(),
        "rubric_id" => $faker->numberBetween(1, 6),
        "img" => "post_images/2024-03-01/fPE79hqag6NN4ZNpPZlEm5d6707arDk3LZ2C5rDA.jpg",
        "user_id" => $faker->numberBetween(1, 11)
    ];
});
