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
        $validated = $request->validate([
            'rating' => 'required|numeric|min:0.5|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        // Check if user has already rated this provider
        $existingRating = Rating::where('provider_id', $provider->id)
            ->where('rated_by', auth()->id())
            ->first();

        if ($existingRating) {
            // Update existing rating
            $existingRating->update([
                'rating' => $validated['rating'],
                'review' => $validated['review'],
            ]);
        } else {
            // Create new rating
            Rating::create([
                'provider_id' => $provider->id,
                'rated_by' => auth()->id(),
                'rating' => $validated['rating'],
                'review' => $validated['review'],
            ]);
        }

        // The provider's average rating will be updated automatically by the Rating model's event handlers

        return back()->with('success', 'Your rating has been submitted!');
    }
}
