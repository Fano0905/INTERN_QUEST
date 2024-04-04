<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer_Application extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'offers_applications';

    protected $fillable = ['offer_id', 'application_id'];

    public function offers(){
        return $this->hasMany(Offer::class, 'offer_id');
    }
}
