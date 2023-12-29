<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerID = User::inRandomOrder()->first();

        return [
            
            'customer_id' => $customerID,
            'serial' => Str::random(8),
            'status'=> fake()->randomElement(['pending', 'paid', 'ondelevey', 'arrived']),
            'total_amount' => fake()->randomFloat(2, 10, 1000),
            'date'=> fake()->date($format = 'Y-m-d', $max = 'now'),
            'discount' =>  fake()->boolean(50) ? fake()->randomFloat(2, 10, 1000) : 0
        ];
    }
}
