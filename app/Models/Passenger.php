<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function trips(){
        return $this->hasMany(TripPassenger::class);
    }

    public function getFullNameAttribute(){
        return $this->first_name .' '.$this->last_name;
    }

}
