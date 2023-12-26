<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerID = User::inRandomOrder()->first();
        $productId = Product::inRandomOrder()->first();

        return [
            'rate' => fake()->numberBetween(1,5),
            'customer_id' => $customerID,
            'product_id' => $productId
        ];
    }
}
