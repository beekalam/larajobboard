<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function states(Country $country)
    {
       return response()->json($country->states->toArray());
    }
}
