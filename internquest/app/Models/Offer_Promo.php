<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer_Promo extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $table = 'offer_promos';

    protected $fillable = ['offer_id', 'promo_id'];

    public function offer(){
        return $this->belongsToMany(Offer::class, 'offer_id');
    }
}
