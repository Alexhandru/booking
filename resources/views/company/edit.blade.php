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
                    <input id="Name" name="Name" class="form-control" type="text" placeholder="Name" value="{{$company->Name}}">
                </div>
                <div class="form-group">
                    <span class="form-label">Email</span>
                    <input name="Email" class="form-control" type="text" placeholder="" value="{{$company->Email}}">
                </div>
                <div class="form-group">
                    <span class="form-label">Telephone</span>
                    <input name="Telephone" class="form-control" type="text" placeholder="" value="{{$company->Telephone}}">
                </div>
                <div class="form-group">
                    <span class="form-label">Description</span>
                    <textarea class="form-control" id="Description" name="Description" rows="3" value="{{$company->Description}}"></textarea>
                </div>
                <div class="form-group">
                    <span class="form-label">LogoPicURL</span>
                    <input name="URL" class="form-control" type="text" placeholder="" value="{{$company->LogoPicURL}}">
                </div>
                <div class="form-btn">
                    <button class="btn btn-primary">Edit</button>
                </div>
               
              </form>
        </div>
    </div>
</div>
@endsection