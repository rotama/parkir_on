<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $table='banks';

    protected $fillable = [
        'no_rek',
        'atas_nama',
        'nm_bank',
    ];
}
