<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validate the search query
        $request->validate([
            'q' => 'required|string|min:3',
        ]);

        $query = $request->input('q');

        // Perform the search
        $requests = ServiceRequest::query()
            ->with(['user', 'tags'])
            ->where('title', 'LIKE', "%$query%")
            ->orWhereHas('tags', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->paginate(10); // Paginate results

        return view('results', ['requests' => $requests]);
    }
}
