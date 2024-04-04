<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Skill;
use App\Models\Company;
use App\Models\Location;
use App\Models\Waiting_User;
use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Validation\Rule;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::paginate(8);
        $pending = Waiting_User::paginate(10);
        $count = count($pending);

        foreach ($offers as $offer){
            $offer->nb_application = $offer->candidature()->count();
        }
        
        foreach ($pending as $users)
            $count++;

        return view('offer.index', \compact('offers', 'count'));
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
            'title' => ['required'],
            'city' => ['required' ],
            'duration' => ['required'],
            'remuneration' => ['required'],
            'date_offer' => ['required'],
            'place_offered' => ['required'],
            'company_id' => ['required'],
            'skills' => ['required', 'array'],
            'skills.*' => ['exists:skills,id'],
            'description' => ['required']
        ]);

        $offer = Offer::create($request->all());
        $offer->skills()->sync($request->input('skills'));

        return redirect()->route('offers.index')
            ->with('success', 'Offre créée avec succès.');
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
        $offer = Offer::find($id);

        $request->validate(
            [
                'title' => ['required'],
                'city' => ['required'],
                'duration' => ['required'],
                'remuneration' => ['required'],
                'date_offer' => ['required'],
                'place_offered' => ['required'],
                'company_id' => ['required'],
                'skills' => ['required', 'array'],
                'skills.*' => ['exists:skills,id'],
                'description' => ['required', 'min:20']
            ]
        );
        $offer->update($request->all());
        $offer->skills()->attach($request->input('skills'));

        return redirect()->route('offers.index')
            ->with('success', "L'offre a bien été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $offer = Offer::find($id);
        $offer->delete();

        return redirect()->route('offers.index')
            ->with('success', "L'offre a bien été supprimé");
    }

    // routes functions
    /**
     * Show the form for creating a new offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $cities = Location::all()->pluck('city');
        $skills = Skill::all();

        return view('offer.create', \compact('companies', 'cities', 'skills'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::find($id);
        $pending = Waiting_User::all();
        $count = count($pending);

        return view('offer.show', compact('offer', 'count'));
    }

    /**
     * Show the form for editing the specified offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);
        $companies = Company::all();
        $cities = Location::all()->pluck('city');
        $skills = Skill::all();

        return view('offer.edit', compact('offer', 'companies', 'cities', 'skills'));
    }
}