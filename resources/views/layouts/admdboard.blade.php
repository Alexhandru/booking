@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p> Insert admin buttons menu form here </p>

            <div> 
                @yield('admin-content')
            </div>
        </div>
    </div>
</div>
@endsection
