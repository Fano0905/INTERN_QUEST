<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Offer;
use App\Models\User;
use App\Models\Waiting_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ApplicationController extends Controller
{
    /**
    * Display a listing of the resource.
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function index($id)
    {
        $applications = Application::all();
        $pending = Waiting_User::all();
        $count = count($pending);

        return view('application.index', compact('applications', 'count'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, $id)
    {
        $request->validate([
            'cv' => 'required',
            'cover_letter'=> 'nullable',
            'user_id' => ['required']
        ]);
    
        // Vérifier si l'utilisateur a déjà postulé
        $user_id = $request->input('user_id');
        $existingApplication = Application::where('user_id', $user_id)->whereHas('offres', function ($query) use ($id) {
            $query->where('id', $id);
        })->first();
    
        if ($existingApplication) {
            return redirect()->route('applications.index')
                ->with('error', 'Vous avez déjà postulé à cette offre.');
        }
    
        $apply = Application::create($request->all());
        $apply->offres()->attach($id);
    
        return redirect()->route('applications.index')
            ->with('success', 'Votre candidature a été prise en compte.');
    }    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function create($id)
    {
        $offer = Offer::find($id);
        $users = User::where('role', '=', 'Etudiant')->orWhere('role', '=', 'Admin')->get();

        return view('application.create', compact('offer', 'users'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $student = User::findOrFail($id);
        $applications = $student->applications;
        $pending = Waiting_User::all();
        $count = count($pending);
    
        return view('application.show', compact('applications', 'count'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {

        $application = Application::find($id);
        $application->delete();

        return redirect()->back()
            ->with('success', 'Votre candidature a été retiré');
    }
}  