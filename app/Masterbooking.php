<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masterbooking extends Model
{
    //
    protected $table='keluars';
    public function booking(){
        return $this->hasone('App\Booking');
    }
}
