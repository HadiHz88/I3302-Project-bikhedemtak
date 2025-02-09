<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::inRandomOrder()->limit(3)->get();
//         dd($services);

        // TODO: Implement popular tags
        $popularTags = [];
        for ($i = 0; $i < 50; $i++) {
            $popularTags[] = "tag-".$i;
        }
//         dd($popularTags);

        $nearbyProviders = User::where(['role' => 'service_provider'])->limit(4)->get();
//         dd($nearbyProviders);

        return view('landing', [
            'services' => $services,
            'popularTags' => $popularTags,
            'nearbyProviders' => $nearbyProviders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
