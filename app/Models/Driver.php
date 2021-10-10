<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Driver extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function trips(){
        return $this->hasMany(TripDriver::class);
    }
    public function getFullNameAttribute(){
        return $this->user->first_name .' '.$this->user->last_name;
    }
    public function getAvatarUrlAttribute(){
        if($this->avatar){
            return asset('/avatars/' . $this->user->user_id . '/' . $this->avatar);
        }else{
            return 'https://i.pravatar.cc/' . rand(300,400);
        }
    }
    public function getAvatarUrlPublicPathAttribute(){
        if($this->avatar){
            return public_path('/avatars/' . $this->user->user_id . '/' . $this->avatar);
        }else{
            return 'https://i.pravatar.cc/' . rand(300,400);
        }
    }
}