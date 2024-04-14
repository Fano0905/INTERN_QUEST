<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Offer;
use App\Models\Promo;
use App\Models\User;
use App\Models\Waiting_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $users = User::all();
        $pending = Waiting_User::all();
        $count = count($pending);

        if(Auth::check()){

            if (Auth::user()->role == 'Etudiant') {
                abort(404, 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.');
            }
        }

        return view('auth.list', compact('users', 'count'));
    }

    public function web(){
        $pending = Waiting_User::all();
        $count = count($pending);
        $offers = Offer::paginate(5);
        $companies = Company::paginate(5);
    

        if (Auth::check()) {

            if (Auth::user()->role == 'Etudiant') {
                abort(404, 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.');
            }

            $promos = Promo::where('pilote_id', Auth::user()->id)->get();
            $mycompany = Auth::user()->my_company;
            return view('accueil', compact('count', 'offers', 'companies', 'mycompany', 'promos'));
        }
    
        return view('accueil', compact('count', 'offers', 'companies'));
    }    

    public function etudiant(){
        $offers = Offer::all();
        $pilotes = User::whereRole('Pilote')->orWhere('role', '=', 'Admin')->get();

        return view('etudiant', compact('offers', 'pilotes'));
    }

    public function pilote(){
        $pending = Waiting_User::all();
        $count = count($pending);
        $users = User::whereRole('Etudiant');
        $mycompany = Auth::user()->my_company;
        $promos = Promo::wherePiloteId(Auth::user()->id)->get();

        if (Auth::check()){

            if (Auth::user()->role == 'Etudiant') {
                abort(404, 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.');
            }
        }

        return view('pilote', compact('count', 'users', 'mycompany', 'promos'));
    }
}
