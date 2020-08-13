@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <a href="/dashboard/location" class="list-group-item list-group-item-action">Location</li></a>
            <a href="/dashboard/room" class="list-group-item list-group-item-action">Room</li></a>
            <a href="/dashboard/company" class="list-group-item list-group-item-action">Company</li></a>

            <div> 
                @yield('admin-content')
            </div>
        </div>
    </div>
</div>
@endsection
