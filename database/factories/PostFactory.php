<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigit,
            'Permalink' => $this->faker->url,
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'updated_at' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
