<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'titre',
        'localite',
        'type_promo',
        'duree',
        'remuneration',
        'date_offre',
        'place_offerte',
        'id_entreprises',
        'description'
    ];

    public function entreprise(){
        return $this->hasOne(Entreprise::class);
    }

    public function candidature(){
        return $this->hasMany(Candidature::class);
    }
}
