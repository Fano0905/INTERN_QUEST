<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $fillable = ['note', 'commentaire', 'id_entreprise', 'objet'];

    public function entreprises(){
        return $this->belongsTo(Entreprise::class);
    }
}
