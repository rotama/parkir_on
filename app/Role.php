<?php

namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    //
 	public function role_user(){
        return $this->hasMany('App\Role_user');
    }  
}
