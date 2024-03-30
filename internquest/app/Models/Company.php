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
        'pilot',
        'location',
        'evaluation'
    ];

    public function pilote() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if ((auth()->check() && auth()->user()->role == 'Pilote') || (auth()->user()->role == 'Admin')) {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->belongsTo(User::class);
        } else {
            // Sinon, retourner null
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
        return $this->belongsTo(Area::class);
    }

    public function location(){
        return $this->belongsToMany(Location::class, 'id');
    }
}
