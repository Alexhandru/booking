<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use  Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\Discount;
use App\Location;
use App\Review;
use App\Image;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function showbyloc($loc,$beds,$date,$date2)
    {   

        $carbon = new Carbon($date);
        $carbon->format('Y-m-d');
  
        $carbon2 = new Carbon($date2);
        $carbon2->format('Y-m-d');
      

        $from = date('2018-10-13');
        $to = date('2018-10-14');
        $check= DB::table('Userroombooking')
        ->whereRaw('"'.$date.'" not between `BookingStart` and `BookingEnd`')
        ->whereRaw('"'.$date2.'" not between `BookingStart` and `BookingEnd`')
        ->whereRaw('`BookingStart` not between "'.$date.'" and "'.$date2.'"')
        ->whereRaw('`BookingEnd` not between "'.$date.'" and "'.$date2.'"')
        ->get();
return $check;

        $date = Carbon::createFromFormat('Y-m-d', $date)->format('Y/m/d');
       
       // $rooms = Room::orderBy('LocationFK','asc')->get();
        $rooms = Room::where([['LocationFK',$loc],['Beds','>',$beds]])
                ->get();
              
       $dt = Carbon::now();
       $getmonths= DB::table('Discount')
           ->whereRaw('"'.$dt.'" between `dateStart` and `dateEnd`')
           ->get();
        
        return view('rooms.index')->with('rooms',$rooms)
        
                                ->with('getmonths',$getmonths);
                                
        
        

    }
    public function showroom($id)
    {  
  

     $room=Room::where('ID',$id)->get();
     
     $values=   DB::table('Userroombooking')
                ->join('Room','Userroombooking.RoomFK','=','Room.ID')
                ->join('Review','Userroombooking.reviewFK','=','Review.ID')
                ->join('Users','Userroombooking.UserFK','=','Users.id')
                ->where('Room.ID',$id)
                //->select('Room.RoomNr','Review.Description')
                ->get();
            
     $images=  DB::table('Image')
                ->join('Room','Image.RoomFK','=','Room.ID')
                ->where('Room.ID',$id)
                ->get();
    $roomNR = DB::table('Room')         
                ->where('ID',$id)
                ->value('RoomNR');
    $rating=DB::table('Userroombooking')
    ->join('Review','Userroombooking.reviewFK','=','Review.ID')
    ->join('Room','Userroombooking.RoomFK','=','Room.ID')
    ->where('Room.ID',$id)
    ->avg('Review.Rating');
    //return $rating;
    $dates=   DB::table('Userroombooking')
                ->join('Room','Userroombooking.RoomFK','=','Room.ID')
                ->where('Room.ID',$id)
                //->select('Room.RoomNr','Review.Description')
                ->get();
     $nrimages=  DB::table('Image')
                ->join('Room','Image.RoomFK','=','Room.ID')
                ->where('Room.ID',$id)
                ->count();
  
        return view('rooms.roomrev')->with('values',$values)
                                   ->with('images',$images)
                                   ->with('roomNR',$roomNR)
                                   ->with('rating',$rating)
                                   ->with('dates',$dates)
                                   ->with('nrimages',$nrimages);
                                    //->with('photos',$photos);
        
    }
}
