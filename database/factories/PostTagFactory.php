<?php

namespace Database\Factories;

use App\Models\PostTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id'              => $this->faker->numberBetween(1,10),
            'taggable_type'       => 'App\Models\Post',
            'taggable_id'         => $this->faker->numberBetween(1,40)
        ];
    }
}
