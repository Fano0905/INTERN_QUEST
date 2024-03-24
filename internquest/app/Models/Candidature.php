<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'cv',
        'lettre_de_motivation',
    ];

    public function etudiant() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && auth()->user()->role && auth()->user()->role->titre == 'Etudiant') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->belongsTo(User::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }

    public function offre(){
        return $this->belongsTo(Offre::class);
    }
}
