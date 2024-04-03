<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Promo;
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
        $offers = Offer::paginate(10);

        return view('offer.index', compact('offers'));
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
            'title' => 'required',
            'location' => 'required',
            'class' => 'required',
            'duration' => 'required',
            'remuneration' => 'required',
            'date_offer' => ['required'],
            'place_offered' => 'required',
            'description' => ['required', 'min:20']
        ]);
        Offer::create($request->all());

        return redirect()->route('offers.index')
            ->with('success', 'Offer created successfully.');
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
        $offer->update($request->validated(
            [
                'title' => 'required',
                'location' => 'required',
                'class' => 'required',
                'duration' => 'required',
                'remuneration' => 'required',
                'date_offer' => ['required'],
                'place_offered' => 'required',
                'description' => ['required', 'min:200']
            ]
        ));

        return redirect()->route('offers.index')
            ->with('success', 'Offer updated successfully.');
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
            ->with('success', 'Offer deleted successfully');
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
        $classes = Promo::all();

        return view('offer.create', \compact('companies', 'classes'));
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

        return view('offer.show', compact('offer'));
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
        $classes = Promo::all();


        return view('offer.edit', compact('offer', 'companies', 'classes'));
    }
}