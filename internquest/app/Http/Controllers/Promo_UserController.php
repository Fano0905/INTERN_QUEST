<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Promo_UserController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function insert($id){

        $student = User::find($id);
    }
}
