<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    public function passengers(){
        return $this->hasMany(TripPassenger::class);
    }

    public function drivers(){
        return $this->hasMany(TripDriver::class);
    }

}
