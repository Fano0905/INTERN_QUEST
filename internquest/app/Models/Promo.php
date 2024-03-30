<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $fillable = ['name', 'pilote_id'];

    public function pilote()
    {
        return $this->belongsTo(User::class, 'pilote_id');
    }
    
    public function etudiants() {
        return $this->hasMany(User::class);
    }
}
