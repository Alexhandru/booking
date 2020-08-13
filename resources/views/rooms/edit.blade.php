@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Room</h1>
            <form  action="/{{$locationID}}/{{$room->ID}}/update-Room"  method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <span class="form-label">Beds</span>
                    <input name="Beds" class="form-control" type="text" value="{{$room->Beds}}">
                </div>
                <div class="form-group">
                    <span class="form-label">Price</span>
                    <input name="Price" class="form-control" type="text" value="{{$room->Price}}">
                </div>
                <div class="form-group">
                    <span class="form-label">RoomNr</span>
                    <input name="RoomNr" class="form-control" type="text" value="{{$room->RoomNr}}">
                </div>
                <div class="form-group">
                    <span class="form-label">URL</span>
                    <input name="URL" class="form-control" type="text" value="{{$room->Picture}}">
                </div>
                <div class="form-btn">
                    <button class="btn btn-primary">Edit</button>
                </div>
               
              </form>
        </div>
    </div>
</div>
@endsection