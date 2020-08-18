<?php

namespace App\Http\Controllers;
use  Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\Discount;
use App\Location;
use App\Review;
use App\Image;
class RoomController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($loc)
    {   
        
       
       // $rooms = Room::orderBy('LocationFK','asc')->get();
       /*
       $rooms = Room::where('LocationFK',$loc)
                ->get();
                
       $dt = Carbon::now();
       $getmonths= DB::table('Discount')
           ->whereRaw('"'.$dt.'" between `dateStart` and `dateEnd`')
           ->get();
     
        return view('rooms.index')->with('rooms',$rooms)
        
                                ->with('getmonths',$getmonths);
                                
        
        
*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('rooms.add')->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'Beds' =>'required',
            'Price' => 'required',
            'RoomNr' => 'required',
            'URL' => 'required'
        ]);

        $room = new Room;

        $room->Beds = $request->input('Beds');
        $room->Price = $request->input('Price');
        $room->RoomNr = $request->input('RoomNr');
        $room->Picture= $request->input('URL');
        $room->LocationFK = $id;

        $room->save();

        return redirect('/dashboard/room/'.$id)->with('success', "Room Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $roomID)
    {
        $room = Room::find($roomID);
        return view('rooms.edit')->with('room', $room)
        ->with('locationID', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locationID, $roomID)
    {
        $this->validate($request, [
            'Beds' =>'required',
            'Price' => 'required',
            'RoomNr' => 'required',
            'URL' => 'required'
        ]);
        
        $room = Room::find($roomID);
        $room->Beds = $request->input('Beds');
        $room->Price = $request->input('Price');
        $room->RoomNr = $request->input('RoomNr');
        $room->Picture= $request->input('URL');

        $room->save();
        
        return redirect('/dashboard/room/'.$locationID)->with('success', 'Room Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locationID, $roomID)
    {
        $room = Room::find($roomID);
        $room->delete();
        return redirect('/dashboard/room/'.$locationID)->with('success', 'Room Deleted');
    }
    
    public function deleteDiscount($locationID, $roomID)
    {
        $room = Room::find($roomID);
        $room->DiscountFK = NULL;
        $room->save();
        return redirect('/dashboard/room/'.$locationID)->with('success', 'Discount Deleted');
    }
    public function createPhoto($roomID)
    {
        return view('rooms.galleryAdd')->with('roomID', $roomID);
    }
    public function storePhoto(Request $request, $roomID)
    {
        $this->validate($request, [
            'URL' => 'required'
        ]);

        $image = new Image;
        $image->RoomFK = $roomID;
        $image->URL = $request->input('URL');
        $image->save();
        return redirect('/gallery/'.$roomID)->with('success', 'Photo Added');
    }
    public function deletePhoto($roomID, $photoID)
    {
        $image = Image::find($photoID);
        $image->delete();
        return redirect('/gallery/'.$roomID)->with('success', 'Photo Deleted');
    }
}
