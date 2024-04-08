<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Promos_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Whoops\Run;

class Promos_UserController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(){

        $promos = Promo::all();
        $etudiants = User::where('role', '=', 'Etudiant')->get();

        return \view('promotion.user.insert', \compact('promos', 'etudiants'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        $request->validate([
            'promo_id' => 'required',
            'user_id' => [
                'required',
                Rule::unique('promos_users', 'user_id')
            ]
        ],[
            'user_id.unique' => 'Cet étudiant se trouve déjà dans une autre promo'
        ]);
        
        Promos_User::create($request->all());
        return redirect()->route('promos.index')
        ->with('success', 'Student added successfully');
    }

    /**
    * Show the form for editing the specified post.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $promos = Promo::all();
        $etudiant = User::find($id);

        return view('promotion.user.edit', \compact('promos', 'etudiant'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $request->validate([
            'promo_id' => [
                'required',
            ],
            'user_id' => [
                'required',
                Rule::unique('promos_users', 'user_id')->ignore($id)
            ]
        ],[
            'user_id.unique' => 'Cet étudiant se trouve déjà dans une autre promo'
        ]);

        return redirect()->route('promos.index')
        ->with('success', "L'etudiant a changé de classe");
    }

    /**
    * Destroy the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $user = User::find($id);
        // Utilisez la méthode promos() pour détacher l'utilisateur de toutes les promotions
        $user->promos()->detach();
    
        return redirect()->back()->with('success', $user->username . " a été retiré de la classe");
    }    
}
