<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Package>
 */
class PackageFactory extends Factory
{
    public function definition(): array
    {
        $start_range = $this->faker->numberBetween(int1: 1, int2: 4);
        $end_range = $this->faker->numberBetween(int1:$start_range, int2:12);

        return [
            'name' => ucwords($this->faker->unique()->words(random_int(2, 8), true)),
            'price' => $this->faker->numberBetween(int1: 600_000, int2: 2_000_000),
            'details' => $this->faker->sentences(random_int(4, 8)),
            'duration' => $this->faker->numberBetween(int1: 60, int2: 420),
            'overview' => $this->faker->text(),
            'image_url' => $this->faker->randomElement($this->images()),
            'people_range' => $start_range.'-'.$end_range,
            'notify_period' => $this->faker->numberBetween(int1: 720, int2: 5000),
        ];
    }

    protected function images(): array
    {
        return [
            'https://images.pexels.com/photos/1591172/pexels-photo-1591172.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/1957011/pexels-photo-1957011.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/1267239/pexels-photo-1267239.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/4099106/pexels-photo-4099106.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/109362/pexels-photo-109362.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/4873502/pexels-photo-4873502.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/4374584/pexels-photo-4374584.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/5638639/pexels-photo-5638639.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/12194603/pexels-photo-12194603.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/9627719/pexels-photo-9627719.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/4503875/pexels-photo-4503875.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/4992937/pexels-photo-4992937.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/10213671/pexels-photo-10213671.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/4099105/pexels-photo-4099105.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/6794050/pexels-photo-6794050.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
            'https://images.pexels.com/photos/10024455/pexels-photo-10024455.jpeg?auto=compress&cs=tinysrgb&w=610&h=915&dpr=2',
        ];
    }
}
