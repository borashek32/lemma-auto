<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Faq::class;

    public function definition()
    {
        return [
            'user_id'   => $this->faker->numberBetween(1,10),
            'question'  => $this->faker->words(6, true),
            'answer'    => $this->faker->words(200, true)
        ];
    }
}
