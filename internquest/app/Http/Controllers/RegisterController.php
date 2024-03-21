<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        $user = new User();
        return view('auth.register', ['user' => $user]);
    }

    public function store(RegisterRequest $request){
        $user = User::create($request->validated());
        return \redirect()->route('auth.login', $user)->with('success', "L'utilisateur a bien été sauvegardé");
    }
}
