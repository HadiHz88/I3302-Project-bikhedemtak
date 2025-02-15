<?php

namespace Database\Seeders;

use App\Models\Provider;
use App\Models\Rating;
use App\Models\ServiceRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create base users
        $users = User::factory(50)->create();

        // Create tags
        $tags = Tag::factory(50)->create();

        // Create providers (some users are providers)
        $providers = Provider::factory(20)
            ->create([
                'user_id' => function () use ($users) {
                    return $users->random()->id;
                }
            ]);

        // Create service requests
        $serviceRequests = ServiceRequest::factory(100)
            ->create([
                'user_id' => function () use ($users) {
                    return $users->random()->id;
                }
            ]);

        // Associate tags with service requests
        $serviceRequests->each(function ($serviceRequest) use ($tags) {
            // Attach 1 to 5 random tags to each service request
            $serviceRequest->tags()->attach(
                $tags->random(rand(1, 5))->pluck('id'));
        });

        // Create ratings for providers
        $providers->each(function ($provider) use ($users) {
            // Create 1 to 10 ratings for each provider
            Rating::factory(rand(1, 10))->create([
                'provider_id' => $provider->id,
                'rated_by' => $users->random()->id,
            ]);
        });

        // Update provider ratings based on their ratings
        $providers->each(function ($provider) {
            $averageRating = $provider->ratings()->avg('rating');
            $provider->update(['rating' => $averageRating ?? 0]);
        });

        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Default password
        ]);
    }
}
