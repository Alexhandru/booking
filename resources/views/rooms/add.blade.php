@extends('layouts.admdboard')

@section('admin-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add a new Room</h1>
            <form  action="/{{$id}}/add-Room"  method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <span class="form-label">Beds</span>
                    <input name="Beds" class="form-control" type="text" placeholder="Beds">
                </div>
                <div class="form-group">
                    <span class="form-label">Price</span>
                    <input name="Price" class="form-control" type="text" placeholder="Price">
                </div>
                <div class="form-group">
                    <span class="form-label">RoomNr</span>
                    <input name="RoomNr" class="form-control" type="text" placeholder="RoomNr">
                </div>
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