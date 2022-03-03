<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LawFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'        => $this->faker->words(4, true),
            'description'  => $this->faker->words(200, true),
            'link'         => $this->faker->words(1, true)
        ];
    }
}
