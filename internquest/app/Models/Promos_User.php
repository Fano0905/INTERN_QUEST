<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promos_User extends Model
{
    use HasFactory;

    // Define the relationship with the Promos_User model

    public $timestamps = false;

    protected $table = 'promos_users';

    protected $fillable = ['promo_id', 'user_id'];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}

