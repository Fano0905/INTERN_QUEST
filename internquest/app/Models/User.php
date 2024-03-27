<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $timestamps = false;
    
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'username',
        'role',
        'centre'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //Fonctions Admin

    public function admin(){
        if(auth()->check() && auth()->user()->role == 'Admin') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return [$this->hasMany(Entreprise::class), $this->hasMany(Promotion::class), $this->belongsToMany(Promotion::class)];
        }
    }

    //Fonctions Pilote

    public function role(){
        return $this->hasOne(Role::class);
    }

    public function entreprise() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && auth()->user()->role == 'Pilote') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->hasOne(Entreprise::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }
    public function promo_pilote() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && auth()->user()->role == 'Pilote') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->hasOne(Promotion::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }

    //Fonctions Etudiant

    public function candidature() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && auth()->user()->role == 'Etudiant') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->hasMany(Candidature::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }

    public function promo_etudiant() {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle
        if(auth()->check() && auth()->user()->role == 'Etudiant') {
            // Si l'utilisateur a le rôle "pilote", retourner la relation
            return $this->belongsTo(Promotion::class);
        } else {
            // Sinon, retourner null ou une autre valeur selon votre logique
            return null;
        }
    }
}
