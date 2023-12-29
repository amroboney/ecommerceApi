<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productID = Product::inRandomOrder()->first();
        $orderID = Order::inRandomOrder()->first();

        return [
            'product_id' => $productID,
            'order_id' => $orderID,
            'quantity' => fake()->numerify(),
            'price'=> fake()->randomFloat(2, 10, 1000)
        ];
    }
}
