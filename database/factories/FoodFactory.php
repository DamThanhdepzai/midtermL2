<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(1),
            'detail' => $this->faker ->sentences(2),
            'price' => '45000',
            'image' => '' .rand(1,3).'.jpg',
            'category_id' =>'1',
        ];
    }
}