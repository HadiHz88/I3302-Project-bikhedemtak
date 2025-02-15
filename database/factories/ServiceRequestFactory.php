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
            'provider_id' => User::factory(),
            'title' => fake()->jobTitle,
            'salary' => '$' . number_format(fake()->randomFloat(2, 500, 10000), 2),
            'schedule' => fake()->dateTime()->format('Y-m-d H:i:s'),
            'location' => fake()->city(),
        ];
    }
}
