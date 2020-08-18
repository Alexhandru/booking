@extends('layouts.admdboard')

@section('admin-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Modify the rooms of the following locations:</h1>
            @foreach ($location as $item)
                <a href="/dashboard/room/{{$item->ID}}" class="list-group-item list-group-item-action">{{$item->Name}}, {{$item->City}}</a>
            @endforeach
            <div> 
                @yield('admin-content')
            </div>
        </div>
    </div>
</div>
@endsection
