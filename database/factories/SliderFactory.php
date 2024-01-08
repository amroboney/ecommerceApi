<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $tag = 1;   
        return [
            'title' => fake()->word,
            'description' => fake()->sentence,
            'image' => fake()->randomElement(["slider1", "slider2", "slider3"]),
            'link' => fake()->url,
            'status' => fake()->randomElement([true, false]),
            'tag' => $tag++
        ];
    }
}
