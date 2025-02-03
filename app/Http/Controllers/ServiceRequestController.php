<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
   /**
     * Display a listing of the service requests.
     */
    public function index()
    {
        return response()->json(ServiceRequest::all(), 200);
    }

    /**
     * Store a newly created service request in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,accepted,completed,canceled',
        ]);

        $serviceRequest = ServiceRequest::create($validated);
        return response()->json($serviceRequest, 201);
    }

    /**
     * Display the specified service request.
     */
    public function show(ServiceRequest $serviceRequest)
    {
        return response()->json($serviceRequest, 200);
    }

    /**
     * Update the specified service request in storage.
     */
    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        $validated = $request->validate([
            'status' => 'sometimes|required|in:pending,accepted,completed,canceled',
            'description' => 'nullable|string',
        ]);

        $serviceRequest->update($validated);
        return response()->json($serviceRequest, 200);
    }

    /**
     * Remove the specified service request from storage.
     */
    public function destroy(ServiceRequest $serviceRequest)
    {
        $serviceRequest->delete();
        return response()->json(['message' => 'Service request deleted'], 200);
    }
}