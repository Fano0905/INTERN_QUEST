<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaniesEvaluations extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'companies_evaluations';

    protected $fillable = ['company_id', 'evaluation_id'];

    public function evaluations(){
        return $this->hasMany(Evaluation::class, 'evaluation_id');
    }
}
