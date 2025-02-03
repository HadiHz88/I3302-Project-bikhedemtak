<?php

namespace Database\Factories;

use App\Models\Rating;
use App\Models\User;
use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'provider_id' => User::factory(),
            'service_request_id' => ServiceRequest::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->sentence(),
        ];
    }
}