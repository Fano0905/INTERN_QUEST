<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Skill extends Model
{
    public $timestamps = \false;

    protected $table = 'user_skills';

    protected $fillable = ['user_id', 'skill_id'];

    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }
}
