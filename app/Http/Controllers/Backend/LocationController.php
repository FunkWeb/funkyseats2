<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.locations.index', [
            'locations' => Location::orderBy('name')->withCount('resources')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.

     */
    public function create()
    {
        $location = new Location();

        return view('admin.locations.create')->with(compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:30'],
            'description' => ['required']
        ]);

        $location = Location::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect(route('admin.locations.show', $location));
    }

    /**
     * Display the specified resource.
     *
     * @param Location $location
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Location $location)
    {
        return view('admin.locations.show', [
            'location' => $location,
            'resources' => $location->resources->sortBy('name', SORT_NATURAL),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Location $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('admin.locations.edit')->with(compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:30'],
            'description' => ['required']
        ]);

        $location->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect(route('admin.locations.show', $location));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect(route('admin.locations.index'));
    }
}
