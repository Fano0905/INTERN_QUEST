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
        return $this->hasMany(Application::class);
    }

    public function promos(){
        return $this->belongsToMany(Promo::class);
    }
}
