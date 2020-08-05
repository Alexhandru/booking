@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Location</h1>
            <form>
                <div class="form-group">
                    <span class="form-label">Name</span>
                    <input name="Name" class="form-control" type="text" placeholder="Name" value={{$location->Name}}>
                </div>
                <div class="form-group">
                    <span class="form-label">Address</span>
                    <input name="Address" class="form-control" type="text" placeholder="" value={{$location->Adress}}>
                </div>
                <div class="form-group">
                    <span class="form-label">Category</span>
                    <input name="Category" class="form-control" type="text" placeholder="" value={{$location->Category}}>
                </div>
                <div class="form-group">
                    <span class="form-label">City</span>
                    <input name="City" class="form-control" type="text" placeholder="" value={{$location->City}}>
                </div>
                <div class="form-group">
                    <span class="form-label">Company ID</span>
                    <input name="CompanyFK" class="form-control" type="text" placeholder="" value={{$location->CompanyFK}}>
                </div>
                <div class="form-group">
                    <span class="form-label">URL</span>
                    <input name="URL" class="form-control" type="text" placeholder="" value={{$location->URL}}>
                </div>
                <div class="form-btn">
                    <button class="btn btn-primary">Edit</button>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection