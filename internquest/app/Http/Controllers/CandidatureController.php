<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatures = Candidature::all();

        return view('candidature.index', compact('candidatures'));
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
            'cv' => 'required', Rule::file(),
            'lettre_de_motivation' => Rule::file(),
        ]);

        Candidature::create($request->all());

        return redirect()->route('candidatures.index')
            ->with('success', 'Candidature created successfully.');
    }

    // routes functions
    /**
     * Show the form for creating a new candidature.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidature.create');
    }

}