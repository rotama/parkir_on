<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table='bookings';

    public function user(){
        return $this->belongsto('App\User');
    }

    public function parkir(){
        return $this->belongsto('App\Parkir');
    }
    
    public function bukti(){
        return $this->belongsto('App\Bukti_trans','booking_id');
    }
    public function masterbooking(){
        return $this->belongsto('App\Masterbooking');
    }
}
