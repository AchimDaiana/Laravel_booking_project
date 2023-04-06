<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['seat_nr','row','is_booked','room_id'];

    public function room(){
        return $this->belongsTo(Room::class);
}

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
