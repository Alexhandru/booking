<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = 'room';
    protected $primaryKey = 'id';

    public function location() {
        return $this->belongsTo('\App\Location' , 'LocationFK') ;
    }
    public function image() {
       return $this->hasMany('\App\Image');
    }
    
  //  public function review(){
    //    return $this->hasMany(Review::class);
    //}
    public function reviews(){
       
    return $this->belongsToMany(Review::class,'Userroombooking2','RoomFK','reviewFK');
    }
   
    public function discounts(){
        return $this->belongsTo('\App\Discount', 'DiscountFK');
    }
   /*
    public function location(){
        return $this->belongsTo('App\Location');
    }*/
}
