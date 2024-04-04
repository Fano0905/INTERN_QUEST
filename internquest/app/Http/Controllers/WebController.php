<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $users = User::all();

        return \view('auth.list', \compact('users'));
    }

    public function web(){
        $pending = Waiting_User::all();
        $offers = Offer::paginate(5);
        $count = count($pending);

        foreach ($pending as $users)
            $count++;
        return \view('accueil', \compact('count', 'offers'));
    }
}
