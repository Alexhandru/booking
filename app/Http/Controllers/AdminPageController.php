<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
class AdminPageController extends Controller
{
    //
    public function ViewDashboard(){
        return view('admin.adminwelcome');
    }
    
    public function ViewUsers(){
        //$user = DB::table('users')->get();
        $users = DB::table('users')
        ->paginate(20);
        return view('admin.userview')->with('users', $users);
    }
    public function ViewLocations(){
        $location = DB::table('location')->get();
        return view('admin.location')->with('location', $location);
    }
    public function ViewCompanies(){
        $company = DB::table('company')->get();
        return view('admin.company')->with('company', $company);
    }
}
