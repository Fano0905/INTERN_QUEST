<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    public $timestamps = \false;

    protected $fillable = ['offer_id', 'user_id'];

    public function wish(){
        return $this->hasMany(Offer::class, 'offer_id');
    }
}
