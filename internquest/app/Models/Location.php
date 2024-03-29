<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['postal_code', 'city', 'location'];

    public function companies(){
        return $this->hasMany(Company::class);
    }
}
