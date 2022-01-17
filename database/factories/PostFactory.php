<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'          => $this->faker->words(2, true),
            'page_text'      => $this->faker->words(200, true),
            'img'            => $this->faker->imageUrl('400', '200'),
            'category_id'    => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'status'         => $this->faker->randomElement(['active', 'inactive']),
            'link'           => $this->faker->domainName
        ];
    }
}
