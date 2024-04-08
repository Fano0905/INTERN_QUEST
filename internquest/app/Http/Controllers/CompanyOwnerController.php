<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Company_Owner;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CompanyOwnerController extends Controller
{
    public function create(){
        $owners = User::whereRole('Pilote')->orWhere('role', '=', 'Admin')->get();
        $companies = Company::all();

        return \view('company.owner.create', \compact('owners', 'companies'));
    }

    public function store(Request $request){
        $request->validate([
            'company_id' => [
                'required',
                Rule::unique('company_owner', 'company_id')],
            'user_id' => ['required']
        ],[
            'company_id.unique' => "Cette entreprise appartient déjà à quelqu'un."
        ]);

        Company_Owner::create($request->all());
        return redirect()->route('companies.index')
        ->with('success', "L'entreprise a été assigné à un utilisateur");
    }

    /**
    * Show the form for editing the specified post.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $owners = User::whereRole('Pilotes')->orWhere('role', '=', 'Admin')->get();
        $companies = Company::all();

        return view('company.owner.edit', \compact('owners', 'companies'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id){
        $request->validate([
            'company_id' => [
                'required',
                Rule::unique('company_owner', 'company_id')->ignore($id)],
            'user_id' => ['required']
        ], [
            $company = Company::find($request->input('company_id')),
            'company_id.unique' => [$company->name . "appartient déjà à quelqu'un."],
        ]);
        return redirect()->route('companies.index')
        ->with('success', "Mise à jour: L'entreprise a été assigné à un autre utilisateur");
    }

    /**
    * Destroy the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $user = User::find($id);

        // Utilisez la méthode promos() pour détacher l'utilisateur de toutes les promotions
        $user->company()->detach();
    
        return redirect()->back()->with('success', $user->username . " n'est plus propriétaire de l'entreprise");
    }  
}
