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

    public function ViewCompanies(){
        $company = DB::table('company')->get();
        return view('admin.company')->with('company', $company);
    }

    public function ViewLocationsForRooms(){
        $location = DB::table('location')->get();
        return view('admin.locationForRoom')->with('location', $location);
    }

    public function ViewRoomsForLocation($id){
        $rooms = DB::table('room')->leftJoin('discount','room.DiscountFK', '=', 'discount.ID')
        ->where('LocationFK', '=', $id)->select(['room.ID','room.RoomNr', 'room.Picture', 'room.Beds', 'room.Price','room.DiscountFK','discount.dateStart', 'discount.dateEnd', 'discount.discountAmount'])
        ->get();
        return view('admin.rooms')->with('rooms', $rooms)
        ->with('id', $id);
    }

    public function ViewLocations(){
        $location = DB::table('location')->get();
        return view('admin.location')->with('location', $location);
    }
    public function ViewGalleryForRoom($roomID){
        $images = DB::table('image')->where('RoomFK', '=', $roomID)->get();
        return view('rooms.gallery')->with('images', $images)
        ->with('roomID', $roomID);
    }
}
