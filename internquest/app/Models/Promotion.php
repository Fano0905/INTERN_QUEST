<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $fillable = ['promotion', 'id_pilote'];

    public function pilote() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && auth()->user()->role && auth()->user()->role->titre == 'Pilote') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->belongsTo(User::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }

    public function etudiants() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && auth()->user()->role && auth()->user()->role->titre == 'Etudiant') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->hasMany(User::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }
}