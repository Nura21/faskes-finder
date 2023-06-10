<?php

namespace App\Http\Controllers;

use App\Models\HealthFacilities;

class GetLocationController extends Controller
{
    public function index()
    {
        $healths = HealthFacilities::query()
            ->select(['name', 'lat', 'long'])
            ->get();

        return view('welcome2', compact("healths"));
    }
}
