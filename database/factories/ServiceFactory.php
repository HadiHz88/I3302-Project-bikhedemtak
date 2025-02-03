<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'category' => $this->faker->randomElement(['Cleaning', 'Plumbing', 'Tutoring', 'Cooking', 'Haircut']),
            'price' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}