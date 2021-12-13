<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase,
            'index' => $this->faker->randomDigit(),
            'deadline' => $this->faker->dateTimeBetween('-5 day', '+0 days')
        ];
    }
}
