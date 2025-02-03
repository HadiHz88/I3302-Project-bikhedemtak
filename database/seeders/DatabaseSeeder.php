<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\ServiceOffer;
use App\Models\Rating;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating users
        User::factory(10)->create();

        // Check if the email already exists
        if (!User::where('email', 'test@example.com')->exists()) {
            // Creating a test user only if it doesn't exist
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Use bcrypt for password hashing
                'role' => 'service_seeker',
                'phone' => '12345678',
                'address' => 'beirut, Lebanon',
                'remember_token' => Str::random(10),
            ]);
        }

        // Creating services
        Service::factory(5)->create();

        // Creating service requests
        ServiceRequest::factory(10)->create();

        // Creating service offers
        ServiceOffer::factory(10)->create();

        // Creating ratings
        Rating::factory(10)->create();

        // Creating payments
        Payment::factory(10)->create();
    }
}