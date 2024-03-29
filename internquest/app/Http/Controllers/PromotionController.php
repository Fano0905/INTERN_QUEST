<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PromotionController extends Controller
{
    public function index(){
        $promos = Promotion::all();

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
        return view('promotion.create');
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
            'name' => 'required|max:25',
            'user_id' => ['required,', Rule::exists('users', 'users')]
        ]);

        Promotion::create($request->all());

        return redirect()->route('promotions.index')
            ->with('success', 'Class created successfully.');
    }
}
