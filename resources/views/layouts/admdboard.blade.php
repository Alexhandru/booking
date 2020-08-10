@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a href="/dashboard/location" class="nav-link">Location</li></a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Room</li></a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Company</li></a>
                </li>

            </ul>
        </div>
    </div>
  </nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div> 
                @yield('admin-content')
            </div>
        </div>
    </div>
</div>
@endsection
