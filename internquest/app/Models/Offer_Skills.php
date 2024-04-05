<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer_Skills extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $table = 'offers_skills';

    protected $fillable = ['offer_id', 'skill_id'];

    public function offer(){
        return $this->hasMany(Offer::class, 'offer_id');
    }
}
