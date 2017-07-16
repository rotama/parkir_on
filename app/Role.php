<?php

namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    //
    protected $table='roles';

 	public function role_user(){
        return $this->hasMany('App\Role_user');
    } 

    public function users()
    {
        return $this->belongsToMany('User');
    } 
}
