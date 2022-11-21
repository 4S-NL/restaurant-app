<?php

namespace Database\Seeders;

use App\Models\Consumable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsumablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consumable::create([
            'name' => 'cola',
            'category_id' => 1,
            'price'       => 2.80,
        ]);

        Consumable::create([
            'name' => 'carpaccio',
            'category_id' => 2,
            'price'       => 12.00,
        ]);

        Consumable::create([
            'name' => 'T-bone Steak',
            'description' => 'Heerlijke sappige steak geserveerd met frietjes',
            'category_id' => 3,
            'price'       => 18.70,
        ]);

        Consumable::create([
            'name' => 'Ijs',
            'category_id' => 4,
            'price'       => 6.50,
        ]);
    }
}
