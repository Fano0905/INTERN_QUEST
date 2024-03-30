<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promos_User extends Model
{
    use HasFactory;

    protected $fillable = ['promo'];

    public function students(){
        return $this->belongsToMany(User::class);
    }
}
