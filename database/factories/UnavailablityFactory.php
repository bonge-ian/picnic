<?php

namespace Database\Factories;

use App\Models\Unavailablity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Unavailablity>
 */
class UnavailablityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => Carbon::parse($this->faker->dateTimeThisMonth(max: '+8 weeks', timezone: 'Africa/Nairobi'))
                ->toDateString(),
            'starts_at' => $start = $this->faker->time(),
            'ends_at' => Carbon::createFromTimeString(time: $start, tz: 'Africa/Nairobi')
                ->addHours($this->faker->numberBetween(int1: 1, int2: 18))
                ->toTimeString(),
        ];
    }
}
