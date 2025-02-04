<?php

namespace Database\Factories;

use App\Models\ServiceOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_offer_id' => ServiceOffer::factory(), // Creates a related service offer
            'amount' => fake()->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
            'payment_method' => fake()->randomElement(['credit_card', 'paypal', 'cash']),
            'status' => fake()->randomElement(['pending', 'completed', 'failed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
