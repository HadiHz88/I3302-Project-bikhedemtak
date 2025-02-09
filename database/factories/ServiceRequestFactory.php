<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Provider;
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
            'provider_id' => Provider::factory(),
            'title' => fake()->jobTitle,
            'salary' => fake()->randomElement(['$50,000 USD', '$90,000 USD', '$150,000 USD']),
            'location' => 'Remote',
            'schedule' => 'Full Time',
            'featured' => false,
        ];
    }
}