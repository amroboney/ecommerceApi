<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\UserType::create(
            ['title' => 'SuperAdmin'],
            ['title' => 'Admin'],
            ['title' => 'Customer'],
        );
    }
}
