<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $fillable = ['class', 'id_pilot'];

    public function pilote() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && (auth()->user()->role == 'Pilote' || auth()->user()->role == 'Admin')) {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->belongsTo(User::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }

    public function etudiants() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && (auth()->user()->role && auth()->user()->role == 'Etudiant')) {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->hasMany(User::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }
}
