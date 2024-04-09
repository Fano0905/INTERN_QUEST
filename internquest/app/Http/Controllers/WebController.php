<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Models\Waiting_User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $users = User::all();
        $pending = Waiting_User::all();
        $count = count($pending);

        return view('auth.list', \compact('users', 'count'));
    }

    public function web(){
        $pending = Waiting_User::all();
        $offers = Offer::paginate(5);
        $count = count($pending);

        foreach ($pending as $users)
            $count++;
        return \view('accueil', \compact('count', 'offers'));
    }

    public function etudiant(){
        $offers = Offer::all();
        $pilotes = User::whereRole('Pilote')->orWhere('role', '=', 'Admin')->get();

        return view('etudiant', compact('offers', 'pilotes'));
    }

    public function pilote(){
        $users = User::whereRole('Etudiant');

        return \view('pilote');
    }
}
