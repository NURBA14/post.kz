<?php

namespace Database\Factories;

use App\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->words(3, true),
            "content" => $this->faker->paragraph(3),
            "created_at" => now(),
            "updated_at" => now(),
            "rubric_id" => $this->faker->numberBetween(1, 20),
            "img" => $this->faker->randomElement([
                "test/1.jpg",
                "test/2.jpg",
                "test/3.jpg",
                "test/4.jpg",
                "test/5.jpg",
                "test/6.jpg",
                "test/7.jpg",
                "test/8.jpg",
                "test/9.jpg",
                "test/10.jpg",
                "test/11.jpg",
                "test/12.jpg",
                "test/13.jpg",
                "test/14.jpg",
                "test/15.jpg",
                "test/16.jpg",
                "test/17.jpg",
                "test/18.jpg",
                "test/19.jpg",
                "test/20.jpg"
            ]),
            "user_id" => $this->faker->numberBetween(1, 100),
        ];
    }
}
