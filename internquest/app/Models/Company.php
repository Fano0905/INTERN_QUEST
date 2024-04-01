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
    ];

    public function offre(){
        return $this->hasMany(Offer::class);
    }

    public function note(){
        return $this->hasMany(Evaluation::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function location(){
        return $this->belongsToMany(Location::class, 'companies_locations', 'company_id', 'location_id');
    }
}
