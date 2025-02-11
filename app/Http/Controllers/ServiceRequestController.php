<?php

namespace App\Http\Controllers;

use App\Models\Job;
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
        // $requests = ServiceRequest::latest()->with(['provider', 'tags'])->get()->groupBy('featured');

        // return view('requests.index', [
        //     'requests' => $requests[0],
        //     'featuredRequests' => $requests[1],
        //     'tags' => Tag::all(),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('requests.create');
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
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
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
}
