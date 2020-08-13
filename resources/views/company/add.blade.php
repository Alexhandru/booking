@extends('layouts.admdboard')

@section('admin-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add a new Company</h1>
            <form  action="/add-Company"  method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <span class="form-label">Name</span>
                    <input id="Name" name="Name" class="form-control" type="text" placeholder="Name" >
                </div>
                <div class="form-group">
                    <span class="form-label">Email</span>
                    <input name="Email" class="form-control" type="text" placeholder="Email">
                </div>
                <div class="form-group">
                    <span class="form-label">Telephone</span>
                    <input name="Telephone" class="form-control" type="text" placeholder="Telephone">
                </div>
                <div class="form-group">
                    <span class="form-label">Description</span>
                    <textarea class="form-control" id="Description" name="Description" rows="3"  placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <span class="form-label">LogoPicURL</span>
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