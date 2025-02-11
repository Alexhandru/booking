<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    public function room() {
        return $this->belongsTo('\App\Room' , 'RoomFK') ;
    }
}
