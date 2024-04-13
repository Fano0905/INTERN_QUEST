<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Company;
use App\Models\Location;
use App\Models\Offer;
use App\Models\Offer_Promo;
use App\Models\Offer_Skills;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
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

        foreach ($offers as $offer) {
            $offer->nb_application = $offer->applications()->count();
        }
        return view('offer.index', compact('offers'));
    }

    public function stats()
    {
        // Statistiques des compétences
        $skillsWithCounts = Skill::withCount('offers')->get();
        $skillNames = $skillsWithCounts->pluck('name')->toArray();
        $skillOffersCount = $skillsWithCounts->pluck('offers_count')->toArray();

        // Statistiques des localités (en supposant que vous avez un modèle Location et une colonne city dans la table des offres)
        $localityWithCounts = Offer::select('city', DB::raw('count(*) as offers_count'))
                                    ->groupBy('city')
                                    ->get();
        $localityNames = $localityWithCounts->pluck('city')->toArray();
        $localityOffersCount = $localityWithCounts->pluck('offers_count')->toArray();

        // Statistiques des promotions
        $promoWithCounts = Promo::withCount('offres')->get();
        $promoNames = $promoWithCounts->pluck('name')->toArray();
        $promoOffersCount = $promoWithCounts->pluck('offers_count')->toArray();

        // Statistiques des durées (en supposant que vous avez une colonne duration dans la table des offres)
        $durationWithCounts = Offer::select('duration', DB::raw('count(*) as offers_count'))
                                    ->groupBy('duration')
                                    ->get();
        $durationNames = $durationWithCounts->pluck('duration')->toArray();
        $durationOffersCount = $durationWithCounts->pluck('offers_count')->toArray();

        // Statistiques de la liste de souhaits
        $wishlistWithCounts = DB::table('wishlist')
                                    ->select('offer_id', DB::raw('count(*) as wishlist_count'))
                                    ->groupBy('offer_id')
                                    ->get();
        $wishlistOffersNames = Offer::whereIn('id', $wishlistWithCounts->pluck('offer_id'))
                                    ->pluck('title')
                                    ->toArray();
        $wishlistCount = $wishlistWithCounts->pluck('wishlist_count')->toArray();
        $skillNamesJson = json_encode($skillNames);
        $skillOffersCountJson = json_encode($skillOffersCount);
        $localityNamesJson = json_encode($localityNames);
        $localityOffersCountJson = json_encode($localityOffersCount);
        $promoNamesJson = json_encode($promoNames);
        $promoOffersCountJson = json_encode($promoOffersCount);
        $durationNamesJson = json_encode($durationNames);
        $durationOffersCountJson = json_encode($durationOffersCount);
        $wishlistOffersNamesJson = json_encode($wishlistOffersNames);
        $wishlistCountJson = json_encode($wishlistCount);

        // Assurez-vous que toutes les variables sont définies
        return view('offer.stat', compact(
            'skillNamesJson', 'skillOffersCountJson',
            'localityNamesJson', 'localityOffersCountJson',
            'promoNamesJson', 'promoOffersCountJson',
            'durationNamesJson', 'durationOffersCountJson',
            'wishlistOffersNamesJson', 'wishlistCountJson'
        ));
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

        return view('offer.create', compact('companies', 'cities', 'skills', 'promos'));
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
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5;

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
        $currentItems = $filteredOffers->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentItems, $filteredOffers->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('offer.index', ['offers' => $paginatedItems]);
    }

    /**
    * Display the applications for a specific offer.
    * @param  int  $offer_id
    * @return \Illuminate\Http\Response
    */
    public function showApplications($offer_id)
    {
        $offer = Offer::findOrFail($offer_id);

        $applications = $offer->applications;

        return view('application.index', compact('offer', 'applications'));
    }
}