<?php

namespace Database\Seeders;

use App\Models\Unavailablity;
use Illuminate\Database\Seeder;

class UnavailablitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unavailablity::factory()->count(count: 20)->create();
    }
}
