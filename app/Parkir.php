<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    //
    protected $table='parkirs';

    protected $fillable = [
        'slot',
        'harga',
        'posisi',
        'status',
    ];

    public function booking(){
        return $this->hasMany('App\Booking');
    }
}
