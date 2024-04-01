<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['note', 'comment', 'title', 'company_id', 'user_id'];

    public function entreprises(){
        return $this->belongsTo(Company::class);
    }

    public function noter(){
        return $this->belongsToMany(Company::class, 'companies_evaluations', 'evaluation_id', 'company_id');
    }
}
