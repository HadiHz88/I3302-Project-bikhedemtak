<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * Controller for handling service requests.
 */
class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the service requests.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new service request.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('service-requests.create');
    }

    /**
     * Store a newly created service request in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'description' => 'required|string',
            'status' => 'required|in:pending,accepted,in_progress,completed,canceled',
        ]);

        $serviceRequest = ServiceRequest::create($validated);
        return view('service-requests.show', ['serviceRequest' => $serviceRequest]);
    }

    /**
     * Display the specified service request.
     *
     * @param \App\Models\ServiceRequest $serviceRequest
     * @return \Illuminate\View\View
     */
    public function show(ServiceRequest $serviceRequest)
    {
        return view('service-requests.show', ['serviceRequest' => $serviceRequest]);
    }

    /**
     * Update the specified service request in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceRequest $serviceRequest
     * @return \Illuminate\View\View
     */
    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        $validated = $request->validate([
            'status' => 'sometimes|required|in:pending,accepted,in_progress,completed,canceled',
            'description' => 'nullable|string',
        ]);

        $serviceRequest->update($validated);
        return view('service-requests.show', ['serviceRequest' => $serviceRequest]);
    }

    /**
     * Remove the specified service request from storage.
     *
     * @param \App\Models\ServiceRequest $serviceRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ServiceRequest $serviceRequest)
    {
        Gate::authorize('delete', $serviceRequest);

        $serviceRequest->delete();

        return redirect('/service-requests');
    }
}
