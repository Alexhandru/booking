<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'review';
    protected $primaryKey = 'id';
   // public function room() {
     //   return $this->belongsTo('\App\Room' , 'RoomFK') ;
    //}
   // public function rooms() {
        
    //return $this->belongsToMany(Room::class,'Userroombooking','reviewFK','RoomFK') ;
   // }
    public function rooms() {
        
        return $this->belongsToMany(Room::class,'Userroombooking','reviewFK','ID') ;
        }
}
