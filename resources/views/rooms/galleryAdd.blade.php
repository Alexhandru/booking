@extends('layouts.admdboard')

@section('admin-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add new Photo</h1>
            <form action="/{{$roomID}}/add-Photo" method="POST">
                {{ csrf_field() }}
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