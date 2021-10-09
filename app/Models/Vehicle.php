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

    public function getShortNameAttribute(){
        return "{$this->brand} {$this->model} {$this->year}";
    }

    public function getPictureUrlAttribute(){
        if($this->picture){
            return asset('vehicles/' . $this->vehicle_id . '/' . $this->picture);
        }else{
            return 'http://placehold.it/600x600';
        }
    }

}
