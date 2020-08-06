<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class AdminPageController extends Controller
{
    //
    public function ViewDashboard(){
        return view('layouts.admdboard');
    }
    
    public function ViewUsers(){
        return view('admin.userview');
    }
    public function ViewLocations(){
        $location = DB::table('location')->get();
        return view('admin.location')->with('location', $location);
    }
}
