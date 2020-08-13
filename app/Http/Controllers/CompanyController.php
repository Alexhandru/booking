<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

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
        return view('companies.add');
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
            'LogoPicURL' => 'required'
        ]);

        $company = new Company;

        $company->Name = $request->input('Name');
        $company->Email = $request->input('Email');
        $company->Telephone = $request->input('Telephone');
        $company->Description = $request->input('Description');
        $company->LogoPicURL = $request->input('LogoPicURL');

        $company->save();

        return redirect('/dashboard/company')->with('success', 'Company Added');    }

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
    public function edit($companyID)
    {
        $company = Company::find($companyID);

        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $companyID)
    {
        $this->validate($request,[
            'Name' => 'required',
            'Email' => 'required',
            'Telephone' => 'required',
            'Description' => 'required',
            'LogoPicURL' => 'required'
        ]);

        $company = Company::find($companyID);

        $company->Name = $request->input('Name');
        $company->Email = $request->input('Email');
        $company->Telephone = $request->input('Telephone');
        $company->Description = $request->input('Description');
        $company->LogoPicURL = $request->input('LogoPicURL');

        $company->save();

        return redirect('/dashboard/company')->with('success', 'Company Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyID)
    {
        $company = Company::find($companyID);
        $company->delete();
        return redirect('/dashboard/company')->with('success', 'Company Deleted');
    }
}
