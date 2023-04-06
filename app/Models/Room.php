<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

   protected $fillable = ['room_name','movie_title','movie_description','image'];


    public function seats(){
        return $this->hasMany(Seat::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

}
