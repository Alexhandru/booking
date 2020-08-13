<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userroombooking extends Model
{
    protected $table = 'userroombooking2';
    public $timestamps = false;
    protected $fillable = [
		'BookingStart', 'BookingEnd','UserFK', 'RoomFK',
	];
}
