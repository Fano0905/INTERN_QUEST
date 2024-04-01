<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Promos_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'promo_id' => [
                'required',
                Rule::unique('promos_users')->where(function ($query) use ($request) {
                    return $query->where('user_id', $request->user_id);
                }),
            ],
            'user_id' => 'required',
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
                Rule::unique('promos_users')->where(function ($query) use ($request) {
                    return $query->where('user_id', $request->user_id);
                }),
            ],
            'user_id' => 'required',
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
        $user->etudiants()->detach($id);

        return redirect()->back()->with('success', [$user->user, 'a été retiré de la classe']);
    }
}
