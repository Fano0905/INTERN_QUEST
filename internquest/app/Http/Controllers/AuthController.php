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
        return \redirect()->intended(\route('internquest/'))->with('success', 'You have been disconnected');
    }

    public function doLogin(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return \redirect()->intended(route('internquest/'))->with('success', 'Connection established successfully');
        }
        return \to_route('auth.login')->withErrors([
            'mail' => 'Your mail is not matching your password.',
            'password' => 'Password incorrect'
        ])->onlyInput('email');
    }
    public function show(){
        return \view('auth.user');
    }
}
