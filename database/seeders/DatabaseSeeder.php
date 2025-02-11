<?php

namespace Database\Seeders;

use App\Models\Provider;
use App\Models\ServiceRequest;
use App\Models\Tag;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create base users
        $users = User::factory(20)->create();

        // Create tags
        $tags = Tag::factory(50)->create();

        // Create providers (some users are providers)
        $providers = Provider::factory(8)
            ->create([
                'user_id' => function () use ($users) {
                    return $users->random()->id;
                }
            ]);

        // Create service requests for each provider
        $providers->each(function ($provider) use ($tags) {
            ServiceRequest::factory(rand(2, 5))
                ->create([
                    'provider_id' => $provider->id
                ])
                ->each(function ($request) use ($tags) {
                    // Attach 1-3 random tags to each service request
                    $request->tags()->attach(
                        $tags->random(rand(1, 3))->pluck('id')->toArray()
                    );
                });
        });

        // Create ratings for some service requests
        ServiceRequest::all()->each(function ($request) use ($users) {
            // 70% chance of having a rating
            if (rand(1, 100) <= 70) {
                Rating::factory()->create([
                    'user_id' => $request->provider->user_id, // User being rated (provider)
                    'rated_by' => $users->where('id', '!=', $request->provider->user_id)->random()->id, // Random user doing the rating
                    'service_request_id' => $request->id
                ]);
            }
        });

        // Update provider ratings based on their received ratings
        Provider::all()->each(function ($provider) {
            $averageRating = Rating::where('user_id', $provider->user_id)
                ->avg('rating');

            if ($averageRating) {
                $provider->update(['rating' => $averageRating]);
            }
        });
    }
}
