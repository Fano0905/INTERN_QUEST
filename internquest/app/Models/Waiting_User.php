<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waiting_User extends Model
{
    use HasFactory;

    public $timestamps = \false;

    protected $fillable = [
        'lname',
        'fname',
        'mail',
        'password',
        'username',
        'role', 
        'centre'
    ];

    /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
    protected $hidden = [
        'password',
    ];

    /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'waiting_user';
}
