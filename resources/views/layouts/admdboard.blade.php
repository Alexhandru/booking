@extends('layouts.app')

@section('content')
<style>
        .container {
        height: 100%;
        font-family: 'Quicksand', sans-serif;
    }
    .ribbon {
        height: 100%;
        width: 100%;
        position: absolute;
        background-image: url('{{ asset('assets/backG.jpg')}}');
        background-size: cover;
        z-index: -1;
    }
    .continutul{
        background: white;
        margin-top:5%;
        padding: 50px;
        height: 100%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    </style>
    <div class="ribbon">
    
    </div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a href="/dashboard/location" class="nav-link">Locations</li></a>
                </li>

                <li class="nav-item">
                    <a href="/dashboard/company" class="nav-link">Companies</li></a>
                </li>

                <li class="nav-item">
                    <a href="/dashboard/rooms" class="nav-link">Rooms</li></a>
                </li>

                <li class="nav-item">
                    <a href="/dashboard/users" class="nav-link">Users</li></a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Discounts</li></a>
                </li>

            </ul>
        </div>
    </div>
  </nav>
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
