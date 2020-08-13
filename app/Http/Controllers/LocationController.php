<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Location;
use App\Review;
use App\Room;
use App\Company;

use DB;

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
        $companies = Company::select('name')->get();
        //return $companies;

        return view('locations.add')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Name' => 'required',
            'Address' => 'required',
            'Category' => 'required',
            'City' => 'required',
            'CompanyName' => 'required',
            'URL' => 'required'
        ]);
        
        $company = Company::where('Name', '=', $request->input('CompanyName'))->get()->first();
        $location = new Location;
        //return $company;
        //return $location;
        $location->Name = $request->input('Name');
        $location->Adress = $request->input('Address');
        $location->Category = $request->input('Category');
        $location->City = $request->input('City');
        $location->CompanyFK = $company->ID;
        $location->URL = $request->input('URL');

        $location->save();

        return redirect('/dashboard/location')->with('success', 'Location Added');
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
        $companies = Company::select('name')->get();
        $location = Location::find($id);
        $locationCompanyName = DB::table('company')->where('ID', '=', $location->CompanyFK)
        ->get()->first()->Name;
        return view('locations.edit')->with('location', $location)
        ->with('companies', $companies)
        ->with('locationCompanyName', $locationCompanyName);
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
        
        $this->validate($request,[
            'Name' => 'required',
            'Address' => 'required',
            'Category' => 'required',
            'City' => 'required',
            'CompanyName' => 'required',
            'URL' => 'required'
        ]);
        
        $company = Company::where('Name', '=', $request->input('CompanyName'))->get()->first();
        $location = Location::find($id);

        //return $location;
        $location->Name = $request->input('Name');
        $location->Adress = $request->input('Address');
        $location->Category = $request->input('Category');
        $location->City = $request->input('City');
        $location->CompanyFK = $company->ID;
        $location->URL = $request->input('URL');

        $location->save();

        return redirect('/dashboard/location')->with('success', 'Location Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locationID)
    {
        $location = Location::find($locationID);
        $location->delete();
        return redirect('/dashboard/location')->with('success', 'Location Deleted');
    }

    public function fetch(Request $request){
        //return $request->input('destination');
        //var destination = $request->input('destination');
        $destination = $request->input('destination');
        $first = DB::table('location')->join('room', 'location.ID', '=', 'room.LocationFK')
        ->select('location.*')
        ->where([['Name', 'like', '%'.$request->input('destination').'%'],
        ['Beds', '>=', $request->persons]
        ]);
        return DB::table('location')->join('room', 'location.ID', '=', 'room.LocationFK')
        ->select('location.*')
        ->where([['City', 'like', '%'.$request->input('destination').'%'],
        ['Beds', '>=', $request->persons]])
        ->union($first)
        ->distinct()
        ->get();
        
        
        //return response()->json(['message' => $request->input('destination')], 200);
    }
}
