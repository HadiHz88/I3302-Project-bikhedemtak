<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ServiceRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->jobTitle,
            'salary' => '$' . fake()->numberBetween(10, 1000),
            'schedule' => fake()->dateTime()->format('Y-m-d H:i:s'),
            'location' => fake()->city(),
        ];
    }
}
