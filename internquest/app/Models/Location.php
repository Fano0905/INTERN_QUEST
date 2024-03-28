<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['postal_code', 'city', 'location'];

    public function companies(){
        return $this->belongsToMany(Company::class, 'companies');
    }

    public function bcompanies(){
        return $this->hasMany(Company::class);
    }
}
