<?php

namespace Database\Factories;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::where('user_type_id', 1 )->inRandomOrder()->first();
        $parentId =  Unit::inRandomOrder()->value('id');

        return [
            'name' => fake()->name(),
            'parent_id' => $parentId ? $parentId : 0,
            'status' => fake()->randomElement([true, false]),
            'created_by' => $userId
        ];
    }
}
