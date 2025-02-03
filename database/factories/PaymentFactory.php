<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\ServiceOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'service_offer_id' => ServiceOffer::factory(), // Creates a related service offer
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'cash']),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}