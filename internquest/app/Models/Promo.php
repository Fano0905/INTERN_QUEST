<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $table = 'promos';

    protected $fillable = ['name', 'pilote_id'];

    public function pilote()
    {
        return $this->belongsTo(User::class, 'pilote_id');
    }
    
    public function etudiants() {
        return $this->belongsToMany(User::class, 'promos_users', 'promo_id', 'user_id');
    }

    public function offres(){
        return $this->belongsToMany(Offer::class, 'offer_promos', 'promo_id', 'offer_id');
    }
}
