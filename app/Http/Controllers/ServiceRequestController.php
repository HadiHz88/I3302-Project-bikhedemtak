<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Tag;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Get 20 popular tags
        $popularTags = Tag::limit(20)->get();

        // Get 8 providers
        $providers = Provider::latest()->paginate(8);

        // Get latest 6 service requests with user and tags
        $service_requests = ServiceRequest::latest()
            ->with(['user', 'tags']) // Eager load the user and tags relationships
            ->paginate(6);

        return view('landing', [
            'service_requests' => $service_requests,
            'featuredRequests' => $service_requests,
            'popularTags'      => $popularTags,
            'providers'        => $providers,
            'tags'             => Tag::all(),
            'user'             => $user->name ?? 'Guest',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'You need to log in to post service requests.');
        }

        // Get all available tags for the dropdown
        $tags = Tag::orderBy('name')->get();

        return view('requests.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'schedule' => ['required', 'date'],
            'tag_ids' => ['nullable', 'array'],
            'tag_ids.*' => ['exists:tags,id'],
        ]);

        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'You need to log in to post service requests.');
        }

        try {
            // Create the service request and associate it with the authenticated user
            $serviceRequest = Auth::user()->serviceRequests()->create([
                'title' => $attributes['title'],
                'salary' => $attributes['salary'],
                'location' => $attributes['location'],
                'schedule' => $attributes['schedule'],
            ]);

            // Attach selected tags if any
            if (!empty($attributes['tag_ids'])) {
                $serviceRequest->tags()->attach($attributes['tag_ids']);
            }

            return redirect('/')
                ->with('success', 'Service request created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }
}
