<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('welcome', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('auth.login')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => ['required','min:3'],
            'prenom' => ['required','min:4'],
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore(request()->route('user')),
            ],
            'password' => ['required', 'min:6'],
            'username' => [
                'required',
                Rule::unique('users')->ignore(request()->route('user')),
            ],
            'id_role' => ['max:3']
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('auth.login')
            ->with('success', 'Utilisateur supprimé avec succès');
    }

    // routes functions
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $user = User::find($id);

        return view('auth.user', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('auth.edit', compact('user'));
    }
}