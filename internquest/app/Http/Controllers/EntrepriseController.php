<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use Illuminate\Validation\Rule;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = Entreprise::all();

        return view('entreprise.index', compact('entreprises'));
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
            'nom' => 'required', 'min:3', 'unique:entreprises, nom',
            'secteur' => 'required',
            'site' => 'nullable',
            'id_pilote' => 'nullable',
            'localite' => 'nullable',
            'evaluation' => 'nullable'
        ]);

        Entreprise::create($request->all());

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise created successfully.');
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
            'nom' => ['required', 'min:3', 'unique:entreprises, nom', Rule::unique('entreprises', 'nom')->ignore(request()->route('entreprise'))],
            'secteur' => 'required',
            'site' => 'nullable',
            'id_pilote' => 'nullable',
            'localite' => 'nullable',
            'evaluation' => 'nullable'
        ]);

        $entreprise = Entreprise::find($id);
        $entreprise->update($request->all());

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $entreprise = Entreprise::find($id);
        $entreprise->delete();

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise deleted successfully');
    }

    // routes functions
    /**
     * Show the form for creating a new entreprise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entreprise.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entreprise = Entreprise::find($id);

        return view('entreprise.show', compact('entreprise'));
    }

    /**
     * Show the form for editing the specified entreprise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entreprise = Entreprise::find($id);

        return view('entreprise.edit', compact('entreprise'));
    }
}