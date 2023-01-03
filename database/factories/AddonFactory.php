<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Addon>
 */
class AddonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords($this->faker->unique()->words(random_int(2, 6), true)),
            'price' => $this->faker->numberBetween(int1: 20_000, int2: 500_000),
            'currency' => 'KES',
            'description' => ucfirst($this->faker->text(maxNbChars: 30)),
        ];
    }
}
