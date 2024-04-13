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
        'lname',
        'fname',
        'mail',
        'password',
        'username',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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

    public function promotion(){
        return $this->hasMany(Promo::class, 'pilote_id');
    }

    public function evaluate(){
        return $this->hasMany(Evaluation::class, 'user_id', 'id');
    }

    public function promos() {
        return $this->belongsToMany(Promo::class, 'promos_users', 'user_id', 'promo_id');
    }

    public function my_company(){
        return $this->belongsToMany(Company::class, 'company_owner', 'user_id', 'company_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function skills() {
        return $this->belongsToMany(Skill::class, 'user_skills', 'user_id', 'skill_id');
    }

    public function wish(){
        return $this->belongsToMany(Offer::class, 'wishlist', 'user_id', 'offer_id');
    }
}