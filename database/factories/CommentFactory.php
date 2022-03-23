<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Commentaire::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigit,
            'post_id' => $this->faker->randomDigit,
            'body' => $this->faker->paragraph,
            'updated_at' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
