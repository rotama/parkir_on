<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    protected $table='role_user';

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function user(){
        return $this->belongsto('App\User');
    }

    public function role(){
        return $this->belongsto('App\Role');
    }

}
