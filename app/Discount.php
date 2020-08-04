<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $table = 'discount';
    protected $primaryKey = 'id';
    public function rooms() {
        $this->hasMany('\App\Room');
     }
}
