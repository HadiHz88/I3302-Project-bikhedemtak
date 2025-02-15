<?php

namespace Database\Factories;

use App\Models\Provider;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ratings = [0.0, 1.0, 2.0, 3.0, 4.0, 5.0];

        return [
            'provider_id' => Provider::factory(),
            'rated_by' => User::factory(),
            'rating' => fake()->randomElement($ratings),
            'review' => fake()->sentence(),
        ];
    }
}
