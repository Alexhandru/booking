<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userroombooking extends Model
{
    protected $table = 'userroombooking';
    public $timestamps = false;
    protected $fillable = [
		'BookingStart', 'BookingEnd','UserFK', 'RoomFK',
	];
}
