<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    protected $fillable = [
        'id', 'role_id'
    ];

     public function user(){
        return $this->belongsto('App\User');
    }

    public function role(){
        return $this->belongsto('App\Role');
    }

}
