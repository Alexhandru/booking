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
use App\Userroombooking;
use App\Userroombooking2;
use App\Company;
use App\User;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;


    public function insert($id,$date,$date2,$iduser){
       // $booking=new UserroomBooking;
       $booking=new UserroomBooking2;
        $booking->BookingStart=$date;
        $booking->BookingEnd=$date2;
        $booking->UserFK=$iduser;
        $booking->RoomFK=$id;
         $booking->save();
      
        $room=Room::where('ID',$id)->first();
        $user=User::where('ID',$iduser)->first();
        $userMail=User::where('ID',$iduser)->value('email');
        $username=User::where('ID',$iduser)->value('name');
        
        $locationID=Room::where('ID',$id)
      
        ->value('LocationFK');
        
        $location=Location::where('ID',$locationID)->first();
       // return $location;
       $companyID=Location::where('ID',$locationID)->value('CompanyFK');
      // return $companyID;
    
        //$CompanyID=Location::where('CompanyFK',$locationID)->first()->value('CompanyFK');
        //return $CompanyID;
        $company=Company::where('ID',$companyID)->first();
         
        $destination=$userMail;
        $mailmessage="This is a confirmation email. You have successfully reserved our room ".$username. " ! Your reservation is valid from: ".$date." to: ".$date2." .";//.$data['Password'];
        $headers = "aistenes@yahoo.com";
        mail($destination, "room reserved", $mailmessage,$headers);
        
        return view('rooms.reservedroom')->with('user',$user)
        ->with('location',$location)
        ->with('company',$company)
        ->with('date',$date)
        ->with('date2',$date2)
        ->with('room',$room)
        ->with('usermail',$userMail);
    }
    public function showbyloc($loc,$beds,$date,$date2)
    {   

        $carbon = new Carbon($date);
        $carbon->format('Y-m-d');
  
        $carbon2 = new Carbon($date2);
        $carbon2->format('Y-m-d');
      
        
$bad = DB::table('Room')

->join('Userroombooking2','Room.ID','=','Userroombooking2.RoomFK')


->whereRaw('"'.$date.'"  between `BookingStart` and `BookingEnd`')
->orWhereRaw('"'.$date2.'"  between `BookingStart` and `BookingEnd`')
->orWhereRaw('`BookingStart`  between "'.$date.'" and "'.$date2.'"')
->orWhereRaw('`BookingEnd`  between "'.$date.'" and "'.$date2.'"')

->get();
$rating=collect();
$rooms2=Room::orderBy('LocationFK','asc')->get();
$rooms = collect();
foreach($rooms2 as $room){
    $a=0;
    foreach($bad as $b){
        if($room->ID == $b->RoomFK)
        {
            $a=1;
        }
      
       
    }
    if($room->LocationFK != $loc){
        $a=1;
      
    }
    if($room->Beds < $beds){
       
        $a=1;
    }
    if($a==0){
        $rt=DB::table('Userroombooking2')
        ->join('Review','Userroombooking2.reviewFK','=','Review.ID')
        ->join('Room','Userroombooking2.RoomFK','=','Room.ID')
        ->where('Room.ID',$room->ID)
        ->avg('Review.Rating');
    $rating->push($rt);
    $rooms->push($room);
    }
}
    $index=0;
       $dt = Carbon::now();
       $getmonths= DB::table('Discount')
           ->whereRaw('"'.$dt.'" between `dateStart` and `dateEnd`')
           ->get();
        
        return view('rooms.index')->with('rooms',$rooms)
                                ->with('date',$date)
                                ->with('date2',$date2)
                                ->with('getmonths',$getmonths)
                                ->with('rating',$rating)
                                ->with('index',$index);
        

    }
    public function showroom($id)
    {  
  

     $room=Room::where('ID',$id)->get();
     
     $values=   DB::table('Userroombooking2')
                ->join('Room','Userroombooking2.RoomFK','=','Room.ID')
                ->join('Review','Userroombooking2.reviewFK','=','Review.ID')
                ->join('Users','Userroombooking2.UserFK','=','Users.id')
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
    $rating=DB::table('Userroombooking2')
    ->join('Review','Userroombooking2.reviewFK','=','Review.ID')
    ->join('Room','Userroombooking2.RoomFK','=','Room.ID')
    ->where('Room.ID',$id)
    ->avg('Review.Rating');
    //return $rating;
    $dates=   DB::table('Userroombooking2')
                ->join('Room','Userroombooking2.RoomFK','=','Room.ID')
                ->where('Room.ID',$id)
                //->select('Room.RoomNr','Review.Description')
                ->get();
     $nrimages=  DB::table('Image')
                ->join('Room','Image.RoomFK','=','Room.ID')
                ->where('Room.ID',$id)
                ->count();
                $dt = Carbon::now();
                $getmonths= DB::table('Discount')
                    ->whereRaw('"'.$dt.'" between `dateStart` and `dateEnd`')
                    ->where('ID',)
                    ->get();
  
        return view('rooms.roomrev')->with('values',$values)
                                   ->with('images',$images)
                                   ->with('roomNR',$roomNR)
                                   ->with('rating',$rating)
                                   ->with('dates',$dates)
                                   ->with('getmonths',$getmonths)
                                   ->with('nrimages',$nrimages);

                                    //->with('photos',$photos);
        
    }
}
