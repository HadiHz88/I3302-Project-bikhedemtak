<?php

namespace Database\Factories;

use App\Models\ServiceOffer;
use App\Models\User;
use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceOfferFactory extends Factory
{
    protected $model = ServiceOffer::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'service_request_id' => ServiceRequest::factory(),
            'price' => $this->faker->randomFloat(2, 20, 1000),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}