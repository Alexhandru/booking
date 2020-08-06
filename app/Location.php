<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;
    protected $table = 'location';
    protected $primaryKey = 'ID';
   // public function room() {
     //   $this->has    Many('\App\Room');
    //}

  
    public function rooms() {
       $this->hasMany('\App\Room');
    }
}
