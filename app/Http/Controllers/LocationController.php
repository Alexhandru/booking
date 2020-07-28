<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Location;
use App\Review;
use App\Room;

=======
use Illuminate\Database\Eloquent\Collection;
use App\Location;
use App\Room;
use DB;
>>>>>>> 1a7f69d2136e5e949cc0b1ba84ad8654cd5c699d

class LocationController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {   //$a = Location::where('idPersona', $id)->get();
        //$loc = Location::all();
      //  $reviews = Review::where('RoomFK',$id)->get(); 
       
        //return view('rooms.roomrev')->with('reviews',$reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Location::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetch(Request $request){
        //return $request->input('destination');
        //var destination = $request->input('destination');
        $destination = $request->input('destination');
        $first = DB::table('location')->join('room', 'location.ID', '=', 'room.ID')
        ->select('room.*', 'location.*')
        ->where([['Name', 'like', '%'.$request->input('destination').'%'],
        ['Beds', '>=', $request->persons],
        ]);
        return DB::table('location')->join('room', 'location.ID', '=', 'room.ID')
        ->select('room.*', 'location.*')
        ->where('City', 'like', '%'.$request->input('destination').'%')
        ->union($first)
        ->distinct()
        ->get();
        //return response()->json(['message' => $request->input('destination')], 200);
    }
}
