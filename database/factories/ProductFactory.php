<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::where('user_type_id', 1 )->inRandomOrder()->first();
        $brandId = Brand::inRandomOrder()->first();
        $unitId = Unit::inRandomOrder()->first();
        $categoryId = Category::inRandomOrder()->first();


        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'image' => fake()->randomElement(['test.png', 'test-1.png']),
            'status' => fake()->randomElement([true, false]),
            'special' => fake()->randomElement([true, false]),
            'created_by' => $userId,
            'category_id' => $categoryId,
            'unit_id' => $unitId,
            'brand_id' => $brandId
        ];
    }
}
