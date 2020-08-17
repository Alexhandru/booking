@extends('layouts.admdboard')

@section('admin-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Company</h1>
            <form  action="/{{$company->ID}}/update-Company"  method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <span class="form-label">Name</span>
                    <input name="Name" class="form-control" type="text" value="{{$company->Name}}">
                </div>
                <div class="form-group">
                    <span class="form-label">Email</span>
                    <input name="Email" class="form-control" type="text" value="{{$company->Email}}">
                </div>
                <div class="form-group">
                    <span class="form-label">Telephone</span>
                    <input name="Telephone" class="form-control" type="text" value="{{$company->Telephone}}">
                </div>
                <div class="form-group">
                    <span class="form-label">Description</span>
                    <input name="Description" class="form-control" type="text" value="{{$company->Description}}">
                </div>
                <div class="form-group">
                    <span class="form-label">LogoPicURL</span>
                    <input name="LogoPicURL" class="form-control" type="text" value="{{$company->LogoPicURL}}">
                </div>
                <div class="form-btn">
                    <button class="btn btn-primary">Edit</button>
                </div>
               
              </form>
        </div>
    </div>
</div>
@endsection