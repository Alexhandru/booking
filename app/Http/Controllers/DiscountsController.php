<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\Discount;
use App\Location;
use App\Review;
use App\Image;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locationID ,$roomID)
    {
        return view('discounts.set')->with('roomID', $roomID)
        ->with('locationID', $locationID);
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
        //
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

    public function set(Request $request, $roomID, $locationID)
    {
        $this->validate($request, [
            'DiscountPrice' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required'
        ]);

        $discountID = DB::table('discount')->where([['dateStart', '=', $request->input('StartDate')],
        ['dateEnd', '=', $request->input('EndDate')],
        ['discountAmount', '=', $request->input('DiscountPrice')]])
        ->value('ID');
        
        $room = Room::find($roomID);


        if($discountID != Null){
           
           $room->DiscountFK = $discountID;
           $room->save();
        }
        else{
            $discount = new Discount;
            $discount->discountAmount = $request->input('DiscountPrice');
            $discount->dateStart = $request->input('StartDate');
            $discount->dateEnd = $request->input('EndDate');
            $discount->save();
            $room->DiscountFK = $discount->ID;
            $room->save();
        }

        return redirect('/dashboard/room/'.$locationID)->with('success', 'Added Discount');
    }
}
