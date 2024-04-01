<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaniesEvaluations extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $table = 'companies_evaluations';

    public function locations(){
        return $this->hasMany(Evaluation::class, 'evaluation_id');
    }
}
