<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function passengers(){
        return $this->hasMany(TripPassenger::class);
    }

    public function drivers(){
        return $this->hasMany(TripDriver::class);
    }

    public function getDriverAttribute(){
        return $this->drivers->first();
    }

    public function getDriverNameAttribute(){
        return $this->driver 
            ? $this->driver->driver->full_name
            : 'Sin conductor asignado';
    }

}
