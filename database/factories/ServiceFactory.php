<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $randomServices = [
            'Electricity',
            'Plumbing',
            'Carpentry',
            'Painting',
            'Cleaning',
            'Gardening',
            'Pest Control',
            'HVAC',
            'Moving & Delivery',
            'Tutoring',
            'Auto Repair',
            'IT & Tech Support',
            'Home Renovation',
            'General Handyman',
            'Babysitting',
            'Pet Care',
            'Security Services'
        ];

        $serviceDescriptions = [
            'Electricity' => 'Installation, repair, and maintenance of electrical systems and wiring.',
            'Plumbing' => 'Fixing leaks, installing pipes, and maintaining water and drainage systems.',
            'Carpentry' => 'Building and repairing wooden structures, furniture, and fixtures.',
            'Painting' => 'Interior and exterior painting services for homes and businesses.',
            'Cleaning' => 'Residential and commercial cleaning, including deep cleaning and maintenance.',
            'Gardening' => 'Plant care, landscaping, and garden maintenance services.',
            'Pest Control' => 'Eliminating insects, rodents, and other pests from homes and businesses.',
            'HVAC' => 'Installation and repair of heating and cooling systems.',
            'Moving & Delivery' => 'Assisting with home or office relocations and furniture deliveries.',
            'Tutoring' => 'Providing educational support in various subjects for students of all levels.',
            'Auto Repair' => 'Maintenance and repair services for cars, motorcycles, and other vehicles.',
            'IT & Tech Support' => 'Computer repairs, network setup, and troubleshooting tech issues.',
            'Home Renovation' => 'Remodeling and upgrading homes, including kitchens and bathrooms.',
            'General Handyman' => 'Minor repairs and maintenance tasks around the home or office.',
            'Babysitting' => 'Taking care of children, ensuring their safety and entertainment.',
            'Pet Care' => 'Grooming, pet sitting, and veterinary-related services.',
            'Security Services' => 'Providing surveillance, alarm systems, and security personnel.'
        ];

        return [
            'name' => $name = fake()->randomElement($randomServices),
            'description' => $serviceDescriptions[$name],
            'category' => fake()->randomElement(['Cleaning', 'Plumbing', 'Tutoring', 'Cooking', 'Haircut']),
        ];
    }
}
