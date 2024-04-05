<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'city',
        'class',
        'duration',
        'remuneration',
        'date_offer',
        'place_offered',
        'company_id',
        'description'
    ];

    public function entreprise(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function candidature(){
        return $this->belongsToMany(Application::class, 'offers_applications', 'offer_id', 'application_id');
    }

    public function candidat(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function promos(){
        return $this->belongsToMany(Promo::class, 'offer_promos', 'offer_id', 'promo_id');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class, 'offers_skills', 'offer_id', 'skill_id');
    }
}
