<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Resource;
use App\Models\ResourceType;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Location $location)
    {
        return view('admin.resources.create', [
            'location' => $location,
            'resource' => new Resource(),
            'resource_types' => ResourceType::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Location $location
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request, Location $location)
    {
        $request->validate([
            'name' => ['required'],
            'type_id' => ['required'],
        ]);

        Resource::create([
            'name' => $request->name,
            'location_id' => $location->id,
            'description' => $request->description,
            'active' => true,
            'resource_type_id' => $request->type_id
        ]);

        return redirect(route('admin.locations.show', $location));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Location $location
     * @param Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location, Resource $resource)
    {
        return view('admin.resources.edit', [
            'location' => $location,
            'resource' => $resource,
            'resource_types' => ResourceType::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Location $location
     * @param Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location, Resource $resource)
    {
        $request->validate([
            'name' => ['required'],
            'type_id' => ['required'],
        ]);

        $resource->update([
            'name' => $request->name,
            'location_id' => $location->id,
            'description' => $request->description,
            'active' => $request->active ? true:false,
            'resource_type_id' => $request->type_id
        ]);

        return redirect(route('admin.locations.show', $location));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
