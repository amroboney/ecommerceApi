<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTypeSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Amroboney',
            'email' => 'amroboney@gmail.com',
            'user_type_id' => 1
        ]);

        \App\Models\User::factory(10)->create();

    }
}
