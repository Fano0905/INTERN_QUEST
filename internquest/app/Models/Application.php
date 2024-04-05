<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'cv',
        'cover_letter',
        'user_id'
    ];

    public function etudiant() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function offres(){
        return $this->belongsToMany(Offer::class, 'offers_applications', 'application_id', 'offer_id');
    }    
}
