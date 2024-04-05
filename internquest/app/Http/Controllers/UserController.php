<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Skill;
use App\Models\Waiting_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        $pending = Waiting_User::all();
        $count = count($pending);

        return view('accueil', compact('users', 'count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lname' => ['required', 'min:3'],
            'fname' => ['required', 'min:4'],
            'mail' => ['required','unique:users,mail'],
            'password' => ['required', 'min:6'],
            'username' => ['required','unique:users,username'],
            'role' => ['required'],
            'centre' => ['required']
        ]);
        
        $validator->after(function ($validator) use ($request) {
            // Vérifiez si la combinaison de lname et fname existe déjà
            $existingUser = User::where('lname', $request->lname)->where('fname', $request->fname)->first();
            if ($existingUser) {
                $validator->errors()->add('lname', 'The combination of last name and first name already exists.');
                $validator->errors()->add('fname', 'The combination of last name and first name already exists.');
            }
        });
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->input('role') == "Pilote") {
            User::create($request->all());
            return redirect()->route('internquest')->with('success', 'Nouvel utilisateur ajouté');
        } else {
            Waiting_User::create($request->all());
        }
    
        return redirect()->route('internquest') // Redirige vers la page de connexion
            ->with('success', "Votre compte a été créé, il a été soumis à la validation d'un Pilote ou de l'Admin");
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
            'lname' => ['required','min:3'],
            'fname' => ['required','min:4'],
            'mail' => [
                'required',
                Rule::unique('users', 'mail')->ignore(request()->route('user')),
            ],
            'password' => ['required', 'min:6'],
            'username' => [
                'required',
                Rule::unique('users')->ignore(request()->route('user')),
            ],
            'role' => ['required'],
            'centre' => ['required']
        ]);

        $user = User::find($id);
        $user->update($request->all());

        if (Auth::check()) {
            return redirect()->route('internquest')->with('success', "L'utilisateur a été mis à jour");
        }

        return redirect()->route('internquest.users.index')
            ->with('success', 'user uptdated successfully.');
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

        if (Auth::check()) {
            return redirect()->route('users.list')->with('success', "L'utilisateur a été supprimé.");
        }

        return redirect()->route('auth.login')
            ->with('success', "L'utilisateur a été supprimé");
    }

    public function notifs(){
        $pending_users = Waiting_User::all();
        $count = count($pending_users);

        return \view('auth.notifications', \compact('pending_users', 'count'));
    }

    /**
    * Display the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function learn(){

        $skills = Skill::all();
        $users = User::where('role', '=', 'Etudiant')->orWhere('role', '=', 'Admin')->get();

        return view('auth.skill', \compact('skills', 'users'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function certificate(Request $request){
        $request->validate([
            'user_id' => ['required'],
            'skills' => ['required', 'array'],
            'skills.*' => ['exists:skills,id'],
        ],[
            'skill_id.unique' => 'Cet étudiant a déjà cette compétence'
        ]);
        
        foreach ($request->input('skills') as $skill_id) {
            User_Skill::create([
                'user_id' => $request->input('user_id'),
                'skill_id' => $skill_id
            ]);
        }
        
        return redirect()->route('internquest')
        ->with('success', 'Compétence ajouté au CV');
    }    

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function approve($id){
        $waiting_user = Waiting_User::findOrFail($id);
        User::create([
            'lname' => $waiting_user->lname,
            'fname' => $waiting_user->fname,
            'mail' => $waiting_user->mail,
            'password' => $waiting_user->password,
            'username' => $waiting_user->username,
            'role' => $waiting_user->role,
            'centre' => $waiting_user->centre
        ]);        
        $waiting_user->delete();
        return redirect()->route('internquest')->with('success', "Utilisateur approuvé");
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function disapprove($id)
    {
        $waiting_user = Waiting_User::find($id);
        $waiting_user ->delete();

        return redirect()->route('internquest')->with('success', "L'utilisateur a été supprimé");
    }

    // routes functions
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accueil');
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