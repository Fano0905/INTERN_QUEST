<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Owner extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'company_owner';

    protected $fillable = ['company_id', 'user_id'];

    public function owner(){
        return $this->hasMany(User::class, 'user_id');
    }
}
