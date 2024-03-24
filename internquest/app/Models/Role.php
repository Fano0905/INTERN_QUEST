<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guard = ['titre', 'id_role'];

    public function users(){
        return $this->belongsToMany(User::class, 'users', 'id'); // Utiliser 'users_id' au lieu de 'id'
    }    
}
