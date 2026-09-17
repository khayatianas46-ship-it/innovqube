<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->city(),
            'description' => fake()->paragraph(),
            'price_per_night' => fake()->numberBetween(50, 300),
            'capacity' => fake()->numberBetween(1, 8),
        ];
    }
}