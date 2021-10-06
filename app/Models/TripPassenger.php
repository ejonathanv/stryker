<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPassenger extends Model
{
    use HasFactory;

    public function passenger(){
        return $this->belongsTo(Passenger::class);
    }

    public function trip(){
        return $this->belongsTo(Trip::class);
    }

    public function driver(){
        return $this->belongsTo(TripDriver::class);
    }

    public function getFullNameAttribute(){
        return $this->passenger->first_name .' '. $this->passenger->last_name;
    }

}
