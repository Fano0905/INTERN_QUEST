<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies_Location extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'companies_locations';
    protected $fillable = ['company_id', 'location_id'];

    public function locations(){
        return $this->hasMany(Location::class, 'location_id');
    }
}
