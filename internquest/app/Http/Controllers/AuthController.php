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
        return \redirect()->intended(\route('auth.login'))->with('success', 'Vous avez été déconnecté');
    }

    public function doLogin(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return \redirect()->intended(route('blog.index'))->with('success', 'Connexion établie avec succès');
        }
        return \to_route('auth.login')->withErrors([
            'email' => 'Email invalide',
        ])->onlyInput('email');
    }
    public function show(){
        return \view('auth.user');
    }
}
