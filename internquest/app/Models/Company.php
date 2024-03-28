<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'area',
        'website',
        'id_pilot',
        'location',
        'evaluation'
    ];

    public function pilote() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && auth()->user()->role == 'Pilote') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->belongsTo(User::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }

    public function offre(){
        return $this->hasMany(Offer::class);
    }

    public function evaluation(){
        return $this->hasMany(Evaluation::class);
    }

    public function area(){
        return $this->hasOne(Area::class, 'name', 'area');
    }

    public function location(){
        return $this->hasMany(Location::class, 'id', 'id_location');
    }
}
