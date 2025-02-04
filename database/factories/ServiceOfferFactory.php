<?php

namespace Database\Factories;

use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceOffer>
 */
class ServiceOfferFactory extends Factory
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
            'service_request_id' => ServiceRequest::factory(),
            'price' => fake()->randomFloat(2, 20, 1000),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
