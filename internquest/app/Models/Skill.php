<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    
    public $timestamps = \false;

    public function offers(){
        return $this->belongsToMany(Offer::class, 'offers_skills', 'skill_id', 'offer_id');
    }

    public function skills(){
        return $this->belongsToMany(User::class, 'user_skills', 'user_id', 'skill_id');
    }
}
