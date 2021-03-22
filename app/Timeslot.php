<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
	public $fillable = ['start','end','block','msg'];
	public $timestamps =  false;
    //
}
