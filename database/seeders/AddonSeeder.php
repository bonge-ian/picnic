<?php

namespace Database\Seeders;

use App\Models\Addon;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->addons() as $addon) {
            Addon::factory()->state([
                'name' => $addon,
            ])->create();
        }
    }

    protected function addons(): array
    {
        return [
            '6 pack beer',
            'Cellar cask Wine',
            'Red roses bouquet',
            'Teachers Scotch whiskey',
            '1kg Chocolate Cake',
            'Chocolate set gift pack',
            'Home brewed Arabic Coffee (10 cups)',
            'Sweet pies',
            'Lamb chops 700g',
            'Cream lattes (6 cups)',
            'Pink Gin 750ml',
        ];
    }
}
