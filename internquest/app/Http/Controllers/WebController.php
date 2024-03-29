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
}
