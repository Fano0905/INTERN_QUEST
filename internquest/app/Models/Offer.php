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
        'location',
        'class',
        'duration',
        'remuneration',
        'date_offer',
        'place_offered',
        'id_company',
        'description'
    ];

    public function entreprise(){
        return $this->hasOne(Company::class);
    }

    public function candidature(){
        return $this->hasMany(Application::class);
    }
}
