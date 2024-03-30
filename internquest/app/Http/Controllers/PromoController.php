<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        //dd($request);
        $request->validate([
            'name' => [
                'required',
                'min:3',
                Rule::unique('promotions', 'name')
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
        $promo = Promo::with('pilote')->find($id);

        return view('promotion.show', compact('promo'));
    }

    public function destroy($id)
    {

        $promo = Promo::find($id);
        $promo->delete();

        return redirect()->route('promos.index')
            ->with('success', 'Class deleted successfully');
    }
}
