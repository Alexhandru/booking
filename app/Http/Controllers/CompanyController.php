<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Company;
use DB;
class CompanyController extends Controller
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
        return view('company.add');
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
            'Email' => 'required',
            'Telephone' => 'required',
            'Description' => 'required',
            'URL' => 'required'
        ]);
        
        $company = new Company;

        //return $location;
        $company->Name = $request->input('Name');
        $company->Email = $request->input('Email');
        $company->Description = $request->input('Description');
        $company->Telephone = $request->input('Telephone');
        $company->LogoPicURL = $request->input('URL');

        $company->save();

        return redirect('/dashboard/company')->with('success', 'Company Added');
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
        $company = Company::find($id);
        return view('company.edit')->with('company', $company);
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
            'Email' => 'required',
            'Telephone' => 'required',
            'Description' => 'required',
            'URL' => 'required'
        ]);

        $company = Company::find($id);

        //return $location;
        $company->Name = $request->input('Name');
        $company->Email = $request->input('Email');
        $company->Description = $request->input('Description');
        $company->Telephone = $request->input('Telephone');
        $company->LogoPicURL = $request->input('URL');

        $company->save();

        return redirect('/dashboard/company')->with('success', 'Company Updated');
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

}
