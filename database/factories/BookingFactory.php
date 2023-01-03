<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => now()->addDays($this->faker->randomNumber(1)),
            'email' => $this->faker->email(),
            'price' => $this->faker->numberBetween(60_000, 100_000),
            'phone' => $this->faker->phoneNumber(),
            'ends_at' => $this->faker->time(),
            'currency' => 'KES',
            'starts_at' => $this->faker->time(),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'is_approved' => $this->faker->boolean(),
            //			'cancelled_at',
            //			'additional_hours',
            //			'preferred_location',
        ];
    }
}
