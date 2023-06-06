<?php

namespace App\Http\Controllers;

use App\Models\HealthFacilities;
use Illuminate\Http\Request;

class HealthFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthFacilities = HealthFacilities::query()
            ->select(['name', 'lat', 'long', 'created_at'])
            ->get();

        return view('manages.health-facility.index', compact("healthFacilities"));
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
    public function show(HealthFacilities $healthFacilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthFacilities $healthFacilities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthFacilities $healthFacilities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthFacilities $healthFacilities)
    {
        //
    }
}
