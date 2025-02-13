<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Provider;

class ProviderController extends Controller
{

    public function show($id)
    {
        $provider = Provider::find($id);
        return view('provider.show', ['provider' => $provider]);
    }

    public function create()
    {
        return view('become-provider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'trustworthy' => 'required'
        ]);

        
        $imagePath = $request->file('image')->store('providers', 'public');

     
        return redirect()->route('providers.create')->with('success', 'You are now a provider!');
    }

}