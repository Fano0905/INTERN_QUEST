<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
    * Add an offer in wishlist.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function AddInwishlist(Request $request){
        $request->validate([
            'offer_id' => ['required']
        ]);

        Wishlist::create([
            'offer_id' => $request->input('offer_id'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('offers.index')
        ->with('success', "L'offre a été ajouté à la wishlist");
    }

    /**
    * Supp an offer from wishlist.
    * @param  int  $offer_id
    * @return \Illuminate\Http\Response
    */
    public function suppFromWishlist($offer_id){
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $user->wish()->detach($offer_id);
    
            return redirect()->route('offers.index')
                ->with('success', "L'offre a été retiré de la wishlist");
        }
    
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour effectuer cette action.');
    }

    // routes functions
    /**
    * Show
    *
    * @return \Illuminate\Http\Response
    */

    public function wishlist(){
        $offers = Auth::user()->wish;

        return view('wishlist', compact('offers'));
    }
}
