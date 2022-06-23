<?php

namespace Database\Factories;

use App\Models\Box;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoxFactory extends Factory
{
    protected $model = Box::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'color' => 'blue',
            'name' => $this->faker->name(),
            'user_id' => 1,
        ];
    }
}
