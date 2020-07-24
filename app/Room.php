<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = 'room';
    protected $primaryKey = 'id';

    public function location(){
        return $this->belongsTo('App\Location');
    }
}
