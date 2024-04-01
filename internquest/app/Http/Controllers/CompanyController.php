<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Evaluation;
use App\Models\Location;
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
        $companies = Company::all();

        return view('company.index', compact('companies'));
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
    
        // Créer la Company avec les données validées
        $companyData = $request->only(['name', 'area', 'website']);
        $company = Company::create($companyData);
    
        // Créer la Location avec les données validées
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
        // Créer la Company avec les données validées
        $companyData = $request->only(['name', 'area', 'website']);
        $company->update($companyData);
    
        // Créer la Location avec les données validées
        $locationData = $request->only(['postal_code', 'city', 'location']);
        $location = $company->locations->first();
        $location->update($locationData);

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully.');
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
        $locations = $company->locations->slice(1); // récupère toutes les adresses sauf la première
        $siege = $company->locations->first(); // récupère la première adresse

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
     * Show the form for editing the specified company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function evaluate($id){

        $company = Company::find($id);

        return \view('opinion.avis', \compact('company'));
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
            'note' => 'numeric', 'comment' => 'required', 'id_company' => ['required'], 'object' => 'required'
        ]);
 
        $company = Company::find($id);
        $evaluation = Evaluation::create($request->all());
 
        return redirect()->route('companies.index')
            ->with('success', 'Your opinion has been saved');
     }
}