<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index(){

        $promos = Promo::all();

        return view('promotion.index', \compact('promos'));
    }

    // routes functions
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pilotes = User::where('role', '=', 'Pilote')->orWhere('role', '=', 'Admin')->get();

        return view('promotion.create', compact('pilotes'));
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
            'name' => [
                'required',
                'min:3',
                Rule::unique('promos', 'name')
            ],
            'pilote_id' => ['required'], // Remplacer 'users' par 'id'
        ]);        

        Promo::create($request->all());

        return redirect()->route('promos.index')
            ->with('success', 'Class created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $promo = Promo::with('pilote', 'etudiants')->find($id);
        $etudiants = $promo->etudiants; // La relation etudiants est maintenant chargée

        return view('promotion.show', compact('promo', 'etudiants'));
    }      

    /**
    * Show the form for editing the specified post.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $promo = Promo::find($id);
        $pilotes = User::where('role', '=', 'Pilote')->orWhere('role', '=', 'Admin')->get();

        return view('promotion.edit', compact('promo', 'pilotes'));
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
            'name' => [
                'required',
                'min:3',
                Rule::unique('promos', 'name')->ignore($id)
            ],
            'pilote_id' => ['required'], // Remplacer 'users' par 'id'
        ]);

        $promo = Promo::find($id);
        $promo->update($request->all());
        return redirect()->route('promos.index')
            ->with('success', 'La classe a bien été mise à jour.');
    }

    public function destroy($id)
    {

        $promo = Promo::find($id);
        $promo->delete();

        return redirect()->route('promos.index')
            ->with('success', 'Class deleted successfully');
    }
}
