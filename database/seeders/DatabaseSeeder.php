<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Fedde',
            'email' => 'f.vangils@curio.nl',
            'password' => \Hash::make('Welkom123')
        ]);

        $this->call([
            CategoriesSeeder::class,
            ConsumablesSeeder::class,
            SeatsSeeder::class
        ]);
    }
}
