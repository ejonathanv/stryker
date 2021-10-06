<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function getFullNameAttribute(){
        return "{$this->brand} {$this->model} {$this->year} - ({$this->capacity}) pasajeros";
    }

}
