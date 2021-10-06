<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripDriver extends Model
{

    use HasFactory;

    protected $dates = ['from_time', 'to_time'];

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function trip(){
        return $this->belongsTo(Trip::class);
    }

}
