<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
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
        $offers = Offer::all();

        return view('offer.index', compact('offers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffreRequest $request)
    {

        Offer::create($request->validated());

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
    public function update(OffreRequest $request, $id)
    {
        $offer = Offer::find($id);
        $offer->update($request->validated());

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
        return view('offer.create');
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

        return view('offer.edit', compact('offer'));
    }
}