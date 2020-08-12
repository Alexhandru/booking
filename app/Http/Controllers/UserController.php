<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Review;

class UserController extends Controller
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

    public function showUserBookings(){
        $currentUser = Auth::user();

        $currentUserID = $currentUser->id;

        $info = DB::table('Userroombooking2')
                ->join('Room', 'Userroombooking2.RoomFK', '=','Room.ID')
                ->join('Location', 'Room.LocationFK','=','Location.ID')
                ->where('UserFK', $currentUserID)
                ->select('Userroombooking2.ID','BookingStart', 'BookingEnd', 'City', 'Name', 'RoomNr', 'RoomFK')
                ->get();

        return view('userpage')->with('info', $info);
    }

    public function deleteBooking($id){

        $sql = DB::delete('DELETE FROM userroombooking2 WHERE ID=?', [$id]);

        return redirect('bookings')->with('success', 'Booking deleted');
    }

    public function showReviewEdit($id){
        // id e id-ul bookingului
        return view('reviewrite')->with('bookingID', $id);
    }


    public function bindReviewBooking($id, $desc, $rat){

        //$reviewID = DB::select('select MAX(ID) from review');
        $reviewID = DB::table('review')->max('id');

        $affected = DB::table('userroombooking2')
        ->where('id', $id)
        ->update(['reviewFK' => $reviewID]);

        //return redirect('bookings')->with('success', 'Review saved.');
    }

    public function writeReview(Request $request, $id){
        // id e id-ul bookingului

        $this->validate($request,[
            'desc' => 'required',
            'rating' => 'required',
        ]);

        $review = new Review;
        $review->Description = $request->input('desc');
        $review->Rating = $request->input('rating');

        $review->save();

        $this->bindReviewBooking($id, $request->input('desc'), $request->input('rating'));

        return redirect('bookings')->with('success', 'Review saved.');
    }


}
