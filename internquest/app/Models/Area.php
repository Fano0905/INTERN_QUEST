<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $guard = ['name'];

    public function company(){
        return $this->belongsToMany(Company::class);
    }
}
