<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    
    public $timestamps = \false;

    public function offer(){
        return $this->belongsToMany(Offer::class);
    }
}
