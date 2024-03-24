<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
use Illuminate\Http\Request;
use App\Models\Offre;
use Illuminate\Validation\Rule;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::all();

        return view('offre.index', compact('offres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffreRequest $request)
    {

        Offre::create($request->validated());

        return redirect()->route('offres.index')
            ->with('success', 'Offre created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OffreRequest $request, $id)
    {
        $offre = Offre::find($id);
        $offre->update($request->validated());

        return redirect()->route('offres.index')
            ->with('success', 'Offre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $offre = Offre::find($id);
        $offre->delete();

        return redirect()->route('offres.index')
            ->with('success', 'Offre deleted successfully');
    }

    // routes functions
    /**
     * Show the form for creating a new offre.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offre.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offre = Offre::find($id);

        return view('offre.show', compact('offre'));
    }

    /**
     * Show the form for editing the specified offre.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offre = Offre::find($id);

        return view('offre.edit', compact('offre'));
    }
}