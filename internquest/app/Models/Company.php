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

    public function notes(){
        return $this->belongsToMany(Evaluation::class, 'companies_evaluations', 'company_id', 'evaluation_id');
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function locations(){
        return $this->belongsToMany(Location::class, 'companies_locations', 'company_id', 'location_id');
    }
}
