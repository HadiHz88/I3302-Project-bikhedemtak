<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Tag;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

        // Get 4 providers
        $providers = Provider::limit(20)->get();

        // Get latest 6 service requests with provider and tags
        $service_requests = ServiceRequest::latest()->with(['provider', 'tags'])->paginate(6);

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');

        // Ensure the user is a provider
        if (!Auth::user()->provider) {
            return redirect()->back()->withErrors(['error' => 'Only providers can create service requests.']);
        }

        $requests = Auth::user()->provider->requests()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]); // Ensure the tag exists
                $requests->tags()->attach($tag->id); // Attach the tag to the service request
            }
        }

        return redirect('/')->with('success', 'Service request created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('requests.create');
    }
}
