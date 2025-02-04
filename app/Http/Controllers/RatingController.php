<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        return response()->json(Rating::all());
    }

    public function show(Rating $rating)
    {
        return response()->json($rating);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rated_by' => 'required|exists:users,id',
            'service_request_id' => 'required|exists:service_requests,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $rating = Rating::create($validated);
        return response()->json($rating, 201);
    }

    public function update(Request $request, Rating $rating)
    {
        $rating->update($request->all());
        return response()->json($rating);
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();
        return response()->json(null, 204);
    }
}
