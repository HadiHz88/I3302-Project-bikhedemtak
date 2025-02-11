<?php

namespace App\Http\Controllers;

use App\Models\Provider;

class ProviderController extends Controller
{

    public function show($id)
    {
        $provider = Provider::find($id);
        return view('provider.show', ['provider' => $provider]);
    }

    


}