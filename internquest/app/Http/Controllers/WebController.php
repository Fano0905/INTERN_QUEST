<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Waiting_User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $users = User::all();
        $pending = Waiting_User::all();
        $count = count($pending);

        return \view('auth.list', \compact('users', 'count'));
    }

    public function web(){
        $pending = Waiting_User::all();
        $count = count($pending);

        foreach ($pending as $users)
            $count++;
        return \view('accueil', \compact('count'));
    }
}
