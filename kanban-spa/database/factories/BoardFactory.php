<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->catchPhrase;
        return [
            'title' => ucfirst($title),
            'user_id' => User::all()->random()
        ];
    }
}
