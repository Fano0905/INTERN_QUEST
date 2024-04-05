<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return \view('auth.login');
    }

    public function logout() {
        Auth::logout();
        return \redirect()->intended(\route('internquest'))->with('success', 'Vous avez été déconnecté');
    }

    public function doLogin(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::guard('waiting_user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('internquest'))->with('success', 'Connexion établie avec succès');
        } 
        if (Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('internquest'))->with('success', 'Connexion établie avec succès [User]');
        }else {
            return redirect()->back()->withErrors([
                'mail' => 'Identifiants invalides',
                'password' => 'Mot de passe incorrect'
            ])->onlyInput('email');
        }
    }

    public function show(){

        return \view('auth.auth');
    }
}
