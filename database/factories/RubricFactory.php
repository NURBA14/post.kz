<?php

namespace Database\Factories;

use App\Rubric;
use Illuminate\Database\Eloquent\Factories\Factory;

class RubricFactory extends Factory
{
    protected $model = Rubric::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->word(),
            "created_at" => now(),
            "updated_at" => now()
        ];
    }
}
