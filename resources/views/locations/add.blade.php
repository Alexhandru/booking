@extends('layouts.admdboard')

@section('admin-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add a new Location</h1>
            <form  action="/add-Location"  method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <span class="form-label">Name</span>
                    <input id="Name" name="Name" class="form-control" type="text" placeholder="Name" >
                </div>
                <div class="form-group">
                    <span class="form-label">Address</span>
                    <input name="Address" class="form-control" type="text" placeholder="Address">
                </div>
                <div class="form-group">
                    <span class="form-label">Category</span>
                    <input name="Category" class="form-control" type="text" placeholder="Category">
                </div>
                <div class="form-group">
                    <span class="form-label">City</span>
                    <input name="City" class="form-control" type="text" placeholder="City">
                </div>
                <div class="form-group">
                    <span class="form-label">Company ID</span>
                    <input name="CompanyFK" class="form-control" type="text" placeholder="Company ID">
                </div>
                <div class="form-group">
                    <span class="form-label">URL</span>
                    <input name="URL" class="form-control" type="text" placeholder="URL">
                </div>
                <div class="form-btn">
                    <button class="btn btn-primary">Add</button>
                </div>
               
              </form>
        </div>
    </div>
</div>
@endsection