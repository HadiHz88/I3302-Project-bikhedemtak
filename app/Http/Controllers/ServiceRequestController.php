<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Provider;
use App\Models\ServiceRequest;
use App\Models\Tag;
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
        // get 20 tags from the database
        $popularTags = Tag::limit(20)->get();

        // get 4 providers from the database
        $providers = Provider::limit(4)->get();

        return view('landing', [
            'popularTags' => $popularTags,
            'providers' => $providers,
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

        $requests = Auth::user()->provider->requests()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $request->tag($tag);
            }
        }

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('requests.create');
    }
}
