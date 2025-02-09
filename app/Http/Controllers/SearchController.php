<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $requests = ServiceRequest::query()
            ->with(['provider', 'tags'])
            ->where('title', 'LIKE', '%'.request('q').'%')
            ->get();

        return view('results', ['requests' => $requests]);
    }
}