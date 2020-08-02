<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    //
    public function ViewDashboard(){
        return view('layouts.admdboard');
    }
    
    public function ViewUsers(){
        return view('admin.userview');
    }
}
