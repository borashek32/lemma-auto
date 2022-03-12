<?php

namespace Database\Factories;

use App\Models\ModelHasRoles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModelHasRolesFactory extends Factory
{
    protected $model = ModelHasRoles::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_id'       => $this->faker->numberBetween(3, 12),
            'model_type'     => 'App\Models\User',
            'role_id'        => '1'
        ];
    }
}
