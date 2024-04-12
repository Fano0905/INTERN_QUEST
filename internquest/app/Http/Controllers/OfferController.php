<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Company;
use App\Models\Location;
use App\Models\Waiting_User;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Offer_Promo;
use App\Models\Offer_Skills;
use App\Models\Promo;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
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
        $offers = Offer::with('skills')->paginate(8);
        $pending = Waiting_User::paginate(10);
        $count = count($pending);

        foreach ($offers as $offer){
            $offer->nb_application = $offer->applications()->count();
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
        foreach ($request->input('skills') as $skill_id) {
            Offer_Skills::create([
                'offer_id' => $offer->id,
                'skill_id' => $skill_id
            ]);
        }

        $offer->skills()->attach($request->input('skills'));

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
                'promos' => ['required', 'array'],
                'promos.*' => ['exists:promos,id'],
                'skills' => ['required', 'array'],
                'skills.*' => ['exists:skills,id'],
                'description' => ['required', 'min:20']
            ]
        );
        $offer->update($request->all());
        foreach ($request->input('skills') as $skill_id) {
            Offer_Skills::create([
                'offer_id' => $offer->id,
                'skill_id' => $skill_id
            ]);
        }
        foreach ($request->input('promos') as $promo_id) {
            Offer_Promo::create([
                'offer_id' => $offer->id,
                'promo_id' => $promo_id
            ]);
        }

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
        $promos = Promo::all();

        return view('offer.create', \compact('companies', 'cities', 'skills', 'promos'));
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
        $promos = Promo::all();

        return view('offer.edit', compact('offer', 'companies', 'cities', 'skills', 'promos'));
    }
    // Ajoutez cette méthode dans votre OfferController

    /**
     * Search for offers based on a query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $offers = Offer::with('entreprise', 'applications', 'promos', 'skills')->get();
        $pending = Waiting_User::all();
        $count = count($pending);

        $filteredOffers = $offers->filter(function ($offer) use ($request) {
            $matchesSkills = true;
            $matchesCity = true;
            $matchesCompany = true;
            $matchesPromos = true;
            $matchesDuration = true;
            $matchesRemuneration = true;
            $matchesDateOffer = true;
            $matchesPlaceOffered = true;
            $matchesApplicationsCount = true;

            if ($request->filled('skills')) {
                $searchSkills = explode(',', $request->skills);
                $matchesSkills = $offer->skills->pluck('name')->intersect($searchSkills)->isNotEmpty();
            }

            if ($request->filled('city')) {
                $matchesCity = str_contains(strtolower($offer->city), strtolower($request->city));
            }

            if ($request->filled('company')) {
                $matchesCompany = $offer->entreprise->name == $request->company;
            }

            if ($request->filled('promos')) {
                $searchPromos = explode(',', $request->promos);
                $matchesPromos = $offer->promos->pluck('name')->intersect($searchPromos)->isNotEmpty();
            }

            if ($request->filled('duration')) {
                $matchesDuration = $offer->duration == $request->duration;
            }

            if ($request->filled('remuneration')) {
                $matchesRemuneration = $offer->remuneration >= $request->remuneration;
            }

            if ($request->filled('date_offer')) {
                $matchesDateOffer = $offer->date_offer == $request->date_offer;
            }

            if ($request->filled('place_offered')) {
                $matchesPlaceOffered = $offer->place_offered >= $request->place_offered;
            }

            if ($request->filled('applications_count')) {
                $matchesApplicationsCount = $offer->applications->count() >= $request->applications_count;
            }

            return $matchesSkills && $matchesCity && $matchesCompany && $matchesPromos && $matchesDuration && $matchesRemuneration && $matchesDateOffer && $matchesPlaceOffered && $matchesApplicationsCount;
        });

        return view('offer.index', ['offers' => $filteredOffers], \compact('count'));
    }


    /**
    * Display the applications for a specific offer.
    * @param  int  $offer_id
    * @return \Illuminate\Http\Response
    */
    public function showApplications($offer_id)
    {
        $offer = Offer::findOrFail($offer_id);
        $pending = Waiting_User::paginate(10);
        $count = count($pending);

        $applications = $offer->applications;

        return view('application.index', compact('offer', 'applications', 'count'));
    }

    /**
    * Search for offers based on a query.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function AddInwishlist(Request $request){
        $request->validate([
            'offer_id' => ['required']
        ]);

        Wishlist::create([
            'offer_id' => $request->input('offer_id'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('offers.index')
        ->with('success', "L'offre a été ajouté à la wishlist");
    }

    /**
    * Display the applications for a specific offer.
    * @param  int  $offer_id
    * @return \Illuminate\Http\Response
    */
    public function suppFromWishlist($offer_id){
        if (Auth::check()) {
            $user = Auth::user();
            $user->wish()->detach($offer_id);
    
            return redirect()->route('offers.index')
                ->with('success', "L'offre a été retiré de la wishlist");
        }
    
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour effectuer cette action.');
    }    
}