<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'blacklist';

    protected $fillable = ['company_id', 'user_id'];

    public function blacklist(){
        return $this->hasMany(User::class, 'user_id');
    }
}
