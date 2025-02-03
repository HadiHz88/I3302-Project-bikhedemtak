<?php

namespace App\Http\Controllers;

use App\Models\ServiceOffer;
use Illuminate\Http\Request;

class ServiceOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(ServiceOffer::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'provider_id' => 'required|exists:users,id',
            'service_request_id' => 'required|exists:service_requests,id',
            'price' => 'required|numeric',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $serviceOffer = ServiceOffer::create($validated);
        return response()->json($serviceOffer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceOffer $serviceOffer)
    {
        return response()->json($serviceOffer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceOffer $serviceOffer)
    {
        $validated = $request->validate([
            'price' => 'sometimes|numeric',
            'status' => 'sometimes|in:pending,accepted,rejected',
        ]);

        $serviceOffer->update($validated);
        return response()->json($serviceOffer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceOffer $serviceOffer)
    {
        $serviceOffer->delete();
        return response()->json(['message' => 'Service Offer deleted successfully']);
    }
}