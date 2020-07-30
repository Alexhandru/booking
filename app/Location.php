<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'location';
    protected $primaryKey = 'id';
   // public function room() {
     //   $this->has    Many('\App\Room');
    //}

    public function rooms(){
        return $this->hasMany('App\Room');
    }
}
