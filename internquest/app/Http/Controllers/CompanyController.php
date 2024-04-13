<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Evaluation;
use App\Models\Location;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);

        foreach ($companies as $company){
            $notes = $company->notes;
            $notesCount = $notes->count();

            if ($notesCount > 0) {
                $totalSum = $notes->sum('note');
                $company->evaluation = $totalSum / $notesCount;
            } else {
                $company->evaluation = 0;
            }
            $company->save();
        }

        return view('company.index', compact('companies'));
    }

    public function filter(Request $request)
    {
        $companies = Company::with('offers', 'notes', 'area', 'locations')->get();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5;
        $sectorsWithCounts = Area::withCount('company')->get();
        
        // Préparez les données pour le graphique
        $sectorNames = $sectorsWithCounts->pluck('name')->toArray();
        $sectorCounts = $sectorsWithCounts->pluck('company_count')->toArray();

        $filteredCompanies = $companies->filter(function ($company) use ($request) {
            $matchesName = true;
            $matchesArea = true;
            $matchesLocation = true;
            $matchesInternsCount = true;
            $matchesEvaluation = true;

            if ($request->filled('name')) {
                $matchesName = str_contains(strtolower($company->name), strtolower($request->name));
            }

            if ($request->filled('area')) {
                $matchesArea = $company->area == $request->area;
            }

            if ($request->filled('location')) {
                $matchesLocation = $company->locations->contains('name', $request->location);
            }

            if ($request->filled('internsCount')) {
                $matchesInternsCount = $company->offre->count() >= $request->internsCount;
            }

            if ($request->filled('evaluation')) {
                $matchesEvaluation = $company->evaluation >= $request->evaluation;
            }

            return $matchesName && $matchesArea && $matchesLocation && $matchesInternsCount && $matchesEvaluation;
        });
        $currentItems = $filteredCompanies->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentItems, $filteredCompanies->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('company.index', ['companies' => $paginatedItems, 'sectorNames' => $sectorNames, 'sectorCounts' => $sectorCounts]);
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
            'name' => [
                'required',
                Rule::unique('companies', 'name')
            ],
            'area' => ['required'],
            'website' => ['required'],
            'postal_code' => ['required'],
            'city' => ['required'],
            'location' => ['required']
        ], [
            'name.required' => 'Please enter the company name.',
            'area.required' => 'Please enter the company area.',
            'website.required' => 'Please enter the company\'s website.',
        ]);
    
        $companyData = $request->only(['name', 'area', 'website']);
        $company = Company::create($companyData);
    
        $locationData = $request->only(['postal_code', 'city', 'location']);
        $location = Location::create($locationData);
        $company->locations()->attach($location->id);
    
        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
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
        $request->validate([
            'name' => [
                'required',
                Rule::unique('companies', 'name')->ignore($id, 'id'),
            ],
            'area' => ['required'],
            'website' => ['required', Rule::unique('companies', 'website')->ignore($id)],
            'postal_code' => ['required'],
            'city' => ['required'],
            'location' => ['required']
        ]);

        $company = Company::find($id);
        
        $companyData = $request->only(['name', 'area', 'website']);
        $company->update($companyData);
    
        
        $locationData = $request->only(['postal_code', 'city', 'location']);
        $location = $company->locations->first();
        $location->update($locationData);

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully.');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function stats(){
        // Obtenez tous les secteurs avec le nombre d'entreprises associées
        $sectorsWithCounts = Area::withCount('company')->get();
        
        // Préparez les données pour le graphique
        $sectorNames = $sectorsWithCounts->pluck('name')->toArray();
        $sectorCounts = $sectorsWithCounts->pluck('company_count')->toArray();

        return view('company.stat', compact('sectorNames', 'sectorCounts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $company = Company::find($id);
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }

    // routes functions
    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
    
        return view('company.create', \compact('areas'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);

        if (!$company) {
            
            return redirect()->back()->with('error', 'Company not found.');
        }
        $locations = $company->locations->slice(1);
        $siege = $company->locations->first();
        return view('company.show', compact('company', 'locations', 'siege'));
    }    

    /**
     * Show the form for editing the specified company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $location = $company->locations->first();
        $areas = Area::all();

        return view('company.edit', compact('company', 'areas', 'location'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function addAddress(Request $request, $id)
    {
        $request->validate([
            'postal_code' => ['required'],
            'city' => ['required'],
            'location' => ['required']
        ]);

        $company = Company::find($id);
    
        
        $locationData = $request->only(['postal_code', 'city', 'location']);
        $location = Location::create($locationData);
        $company->locations()->attach($location->id);

        return redirect()->back()
            ->with('success', 'Nouvelle adresse attribuée');
    }

    /**
    * Show the form for editing the specified company.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function evaluate($id){

        $company = Company::find($id);
        $notes = [1, 2, 3, 4, 5];

        return \view('opinion.avis', \compact('company', 'notes'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    
     public function e_store(Request $request, $id)
     {
        $request->validate([
            'note' => ['required'], 
            'comment' => ['required'], 
            'company_id' => ['required'],
            'user_id' => ['required'],
            'title' => ['required', 'string', 'max:255'],
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
        ]);        
 
        $evaluation = Evaluation::create($request->all());
        $company = Company::find($id);
        $company->notes()->attach($evaluation->id);
 
        return redirect()->route('companies.index')
            ->with('success', 'Your opinion has been saved');
     }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function e_edit($id) {
        $evaluation = Evaluation::with('noter.company')->find($id);
        $notes = [1, 2, 3, 4, 5];        
        $company = $evaluation->noter->company;

        return view('opinion.edit', compact('evaluation', 'notes', 'company'));
    }

    public function list()
    {
        $user = Auth::user();

        $user_co = User::where('id', '=', $user->id)->get();

        $evaluations = $user_co->evaluate()->with('company')->get();

        $companies = collect();

        foreach ($evaluations as $evaluation) {
            if ($evaluation->company) {
                $companies->push($evaluation->company);
            }
        }

        $companies = $companies->unique('id');

        return view('opinion.index', compact('evaluations', 'companies'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    
    public function e_update(Request $request, $id)
    {
        $request->validate([
            'note' => ['required'], 
            'comment' => ['required'], 
            'company_id' => ['required'],
            'user_id' => ['required'],
            'title' => ['required', 'string', 'max:255'],
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'note.required' => 'La note est obligatoire'
        ]);        
 
        $evaluation = Evaluation::find($id);
        $evaluation->update($request->all());
 
        return redirect()->route('companies.index')
            ->with('success', 'Your opinion has been saved');
    }
}