<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bukti_trans extends Model
{
    //
    protected $table='bukti_trans';
    protected $fillable = ['tgl_upload', 'booking_id', 'gambar'];
    public function booking(){
        return $this->hasMany('App\Booking');
    }
}
