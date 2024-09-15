<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'email' => 'admin@admin.com',
            'password' => 'password',
        ];
    }
}
