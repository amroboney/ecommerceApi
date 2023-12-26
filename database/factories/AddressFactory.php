<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
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
            'address_type' => fake()->randomElement(['shipping', 'pilling']),
            'street' =>  fake()->streetAddress,
            'city' =>  fake()->city,
            'state' =>  fake()-> state,
            'country' => fake()->country
        ];
    }
}
