<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
    public function definition(): array
    {
        $userId = User::where('user_type_id', 1 )->inRandomOrder()->first();

        return [
            'name' => fake()->name(),
            'image' => fake()->randomElement(['test.png', 'test-1.png']),
            'status' => fake()->randomElement([true, false]),
            'created_by' => $userId
        ];
    }
}
