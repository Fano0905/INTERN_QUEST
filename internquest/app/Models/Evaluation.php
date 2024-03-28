<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $fillable = ['note', 'comment', 'object', 'title'];

    public function entreprises(){
        return $this->belongsTo(Company::class);
    }
}
