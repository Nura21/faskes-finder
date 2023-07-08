<?php

namespace App\Http\Controllers;

use App\Http\Requests\HealthFacilitiesRequest;
use App\Models\HealthFacilities;

class HealthFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthFacilities = HealthFacilities::query()
            ->select(['id', 'name', 'lat', 'long', 'status', 'created_at'])
            ->where('status', 'ACTIVE')
            ->get();

        return view('manages.health-facility.index', compact("healthFacilities"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manages.health-facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HealthFacilitiesRequest $request)
    {
        HealthFacilities::create([
            'name' => $request->name,
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        return redirect('health-facilities');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $healthFacilities = HealthFacilities::findOrFail($id);

        return view('manages.health-facility.edit', compact('healthFacilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HealthFacilitiesRequest $request, $id)
    {
        $healthFacilities = HealthFacilities::findOrFail($id);

        $healthFacilities->update([
            'name' => $request->name,
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        return redirect('health-facilities');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $healthFacilities = HealthFacilities::findOrFail($id);

        $healthFacilities->delete();

        return redirect('health-facilities');
    }
}
