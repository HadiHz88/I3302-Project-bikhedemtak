<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

use App\Models\Provider;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{

    public function show($id)
    {
        $provider = Provider::find($id);
        return view('provider.show', ['provider' => $provider]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'description' => ['required', 'string'],
            'terms' => ['required'], // Validates that the terms checkbox was checked
        ]);

        // Handle the logo file upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $attributes['logo'] = $logoPath;
        }

        // Remove the terms field as it's not in the database
        unset($attributes['terms']);

        // Set the user_id field to the authenticated user's ID
        $attributes['user_id'] = Auth::id();

        // Create the provider record
        Provider::create($attributes);

        return redirect('/')->with('success', 'You are now registered as a provider!');
    }

    public function create()
    {
        return view('become-provider');
    }

    public function rate(Request $request, Provider $provider)
    {
        $request->validate([
            'rating' => 'required|numeric|between:1,5',
            'review' => 'nullable|string|max:500',
        ]);

        // Create a new rating
        $rating = new Rating([
            'rating' => $request->rating,
            'review' => $request->review,
            'rated_by' => auth()->id(),
        ]);

        // Save the rating
        $provider->ratings()->save($rating);

        // Update the provider's rating field
        $this->updateProviderRating($provider);

        return redirect()->back()->with('success', 'Thank you for your review!');
    }

    protected function updateProviderRating(Provider $provider)
    {
        // Calculate the average rating for this provider
        $averageRating = $provider->ratings()->avg('rating');

        // Update the provider's rating field
        $provider->rating = $averageRating;
        $provider->save();
    }

}
