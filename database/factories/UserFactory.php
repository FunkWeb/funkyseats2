<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'social_id' => Str::random(21),
            'social_type' => 'google',
            'avatar_path' => 'https://path/to/img.png',
            'last_active_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
