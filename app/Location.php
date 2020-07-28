<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'location';
    protected $primaryKey = 'id';
<<<<<<< HEAD
   // public function room() {
     //   $this->hasMany('\App\Room');
    //}
=======

    public function rooms(){
        return $this->hasMany('App\Room');
    }
>>>>>>> 1a7f69d2136e5e949cc0b1ba84ad8654cd5c699d
}
