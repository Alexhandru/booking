<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public $timestamps = false;
    protected $table = 'company';
    protected $primaryKey = 'ID';
    
}
