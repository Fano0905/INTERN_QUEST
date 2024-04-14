<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        if(Auth::check()){

            if (Auth::user()->role == 'Etudiant') {
                abort(404, 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.');
            }
        }

        return view('location.index', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'postal_code' => ['required'],
            'city' => ['required'],
            'location' => ['required']
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')
            ->with('success', 'Location created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'postal_code' => ['required'],
            'city' => ['required'],
            'location' => ['required']
        ]);
        $location = Location::find($id);
        $location->update($request->all());

        return redirect()->route('locations.index')
            ->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Auth::check()){

            if (Auth::user()->role == 'Etudiant') {
                abort(404, 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.');
            }
        }

        $location = Location::find($id);
        $location->delete();

        return redirect()->route('locations.index')
            ->with('success', 'Location deleted successfully');
    }

    // routes functions
    /**
     * Show the form for creating a new location.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){

            if (Auth::user()->role == 'Etudiant') {
                abort(404, 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.');
            }
        }

        return view('location.create');
    }


    /**
     * Show the form for editing the specified location.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);

        if(Auth::check()){

            if (Auth::user()->role == 'Etudiant') {
                abort(404, 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.');
            }
        }

        return view('location.edit', compact('location'));
    }
}