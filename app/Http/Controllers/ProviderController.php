<?php

namespace App\Http\Controllers;

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
            'logo' => ['required', 'image', 'max:2048'], // Validates that this is an image file
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
}
