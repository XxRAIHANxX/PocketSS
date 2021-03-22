<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Fenos\Notifynder\Notifable;

class User extends Model implements AuthenticatableContract,CanResetPasswordContract
{
	   use Authenticatable, CanResetPassword;
	   use Notifable;

	   public function point()
	   {
	   		return $this->hasMany('App\Point');
	   }

}
